<?php

/**
 * マルチバイト対応 wordwrap 関数
 *
 * @param string $str 対象文字列
 * @param int $maxLength １行当たりの最大文字数
 * @param string $break 分割文字列
 * @return string
 */
function wordwrapMultiByte(string $str, int $maxLength, string $break = PHP_EOL) : string
{
    $explode = [];

    // 対象文字列が最大文字数で分割できるだけ分割する
    for ($i = 0; $i <= mb_strlen($str); $i += $maxLength) {
        $explode[] = mb_substr($str, $i, $maxLength, 'UTF-8');
    }
    // 指定区切り文字で分割した文字列を１つにまとめる
    return implode($break, $explode);
}

/**
 * ファイル拡張子を指定拡張子に変換する
 * ex) hoge.tsv → hoge.error
 *
 * @param string $fileName
 * @param string $extension
 * @return string
 */
function convertFileExtensionToExtension(string $fileName, string $extension): string
{
    // ファイル名をドットで分割する
    $fileNameDivision = explode('.', $fileName);
    // 既存の拡張子を削除
    array_pop($fileNameDivision);
    // ファイル名を指定拡張子に変換して返す
    return implode('.', $fileNameDivision) . '.' . $extension;
}

/**
 * ファイル拡張子を取得
 *
 * @param string $fileName
 * @return string
 */
function getFileExtension(string $fileName) : string
{
    // ファイル名をドットで分割する
    $fileNameDivision = explode(".", $fileName);
    // 末尾の拡張子を小文字に変換して返す
    return strtolower(end($fileNameDivision));
}

/**
 * 数値の空チェック
 * 通常の empty判定から 0, '0'はfalseとして判定する
 *
 * @param mixed $val
 * @return bool
 */
function intEmpty($val) : bool
{
    return (empty($val) && $val !== 0 && $val !== '0');
}
