function check(){
            if(window.confirm('本当に削除してよろしいですか？'))
            {
                return true; // OK時は削除実行
            } else{
                window.alert('キャンセルされました。');
                return false; // 削除キャンセル
            }
        }