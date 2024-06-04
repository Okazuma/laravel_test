<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ModalController extends Controller
{
    //


// モーダルの表示ーーーーー
    public function details(Request $request)
    {
        // リクエストからお問い合わせIDを取得
        $contactId = $request->input('id');

        // IDに基づいてお問い合わせを取得
        // $contact = Contact::find($contactId);
        $contact = Contact::with('category')->find($contactId);

        if ($contact) {
            // お問い合わせが見つかった場合は詳細情報を返す
            return response()->json([
                'last_name' => $contact->last_name,
                'first_name' => $contact->first_name,
                'gender' => $contact->gender,
                'email' => $contact->email,
                'tel' => $contact->tel,
                'address' => $contact->address,
                'building' => $contact->building,
                'detail' => $contact->detail,
                'content' => $contact->category_id,
                'category' => $contact->category ? $contact->category->content : '不明',

                // その他の詳細情報を必要に応じて追加する
            ]);
        } else {
            // お問い合わせが見つからなかった場合はエラーを返す
            return response()->json(['error' => 'お問い合わせが見つかりませんでした'], 404);
        }
    }

// ーーーーー


// モーダルでの削除処理ーーーーー

        public function delete(Request $request)
    {
        // バリデーション: リクエストされたIDが数字であることを確認
        $request->validate([
            'id' => 'required|numeric',
        ]);
        // IDに基づいて連絡先を検索し削除
        $contact = Contact::find($request->id);
        if ($contact) {
            $contact->delete();
            // 成功時のレスポンス
            return response()->json(['status' => 'success', 'message' => '連絡先が削除されました']);
        }
        // データが見つからなかった場合のエラーレスポンス
        return response()->json(['status' => 'error', 'message' => '連絡先が見つかりませんでした']);
    }

// 　ーーーーー



// エクスポートの処理ーーーーー

        public function exportData() 
    {
            // エクスポートするデータを取得
            $contacts = Contact::with('category')->get();

            // データを配列に変換
            $contactArray = [];
            foreach ($contacts as $contact) {
                $contactArray[] = [
                    'last_name' => $contact->last_name,
                    'first_name' => $contact->first_name,
                    'gender' => ($contact->gender === 1) ? '男性' : (($contact->gender === 2) ? '女性' : 'その他'),
                    'email' => $contact->email,
                    'category' => $contact->category ? $contact->category->content : 'カテゴリ未設定'
                ];
            }

            return $contactArray;
    }

    // ーーーーー















}
