#マークダウン記法のテスト
段落１

段落２

 *イタリック* そして **強調する** 書き方

前後に半角空白が必要

コードの挿入テスト

```php:test.php
<?php
echo "Hello World\n";
$date_str = date('Y-m-d H:i:s');
echo "{$date_str}\n";
```

#見出し１
あいうえお

##見出し２
###見出し３

打ち消す場合はチルダを使って囲み、 ~~このように打ち消す~~  

*リスト１
*リスト２
*リスト３

DLタグを使う

<dl>
	<dt>名前</dt>
	<dd>説明</dd>
</dl>

----

>引用

タイトルつきリンク

[リンクテキスト](http://www.google.com "タイトル")

タイトル無しリンク

[リンクテキスト２](http://www.google.com)

バックスラッシュでエスケープ
\<dl><dt>aiu</dt><dd>eo</dd></dl>
