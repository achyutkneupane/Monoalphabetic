<?php

namespace App\Http\Livewire;

use IntlChar;
use Livewire\Component;

class Index extends Component
{
    public $plainText, $cipherText, $cipherToDecipher, $decipheredText, $hex;

    public function mount()
    {
        $this->hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];

        $plain = "कखग歝毕毞ABCabc";
        do {
            $this->key = $this->generateUnicodeMap();
            $cipher = "";
            $deciphered = "";
            $plainArray = $this->splitUnicode($plain);

            foreach ($plainArray as $char) {
                $char = IntlChar::ord($char);
                $cipher .= $this->encrypt($char);
            }

            $cipherArray = $this->splitUnicode($cipher);

            foreach ($cipherArray as $char) {
                $char = IntlChar::ord($char);
                $deciphered .= IntlChar::chr($this->decrypt($char));
            }
        } while ($plain != $deciphered);
    }

    public function jumbledHex()
    {
        $newHex = $this->hex;
        shuffle($newHex);
        return $newHex;
    }

    public function generateUnicodeMap()
    {
        $unicodeMap = [];
        for ($i = 0; $i < 4; $i++) {
            $unicodeMap[$i] = $this->jumbledHex();
        }
        return $unicodeMap;
    }

    public function splitUnicode($text) {
        $strArray = str_split($text);
        $newLetter = "";
        $newArray = [];

        foreach($strArray as $char){
            if(!IntlChar::isprint($newLetter)){
                $newLetter .= $char;
            }
            else{
                $newLetter = $char;
            }
            
            if(IntlChar::isprint($newLetter)) {
                $newArray[] = $newLetter;
            }
        }

        return $newArray;
    }


    public function encrypt($char)
    {
        $plain = str_pad(dechex($char), 4, "0", STR_PAD_LEFT);
        $cipher = "";
        foreach (str_split($plain) as $index => $char) {
            $cipher .= $this->key[$index][hexdec($char)];
        }
        $cipher = hexdec($cipher);
        return IntlChar::chr($cipher);
    }

    public function encryptAll()
    {
        $cipher = "";
        $plainArray = $this->splitUnicode($this->plainText);

        foreach ($plainArray as $char) {
            $char = IntlChar::ord($char);
            $cipher .= $this->encrypt($char);
        }
        return $cipher;
    }

    public function decrypt($char)
    {
        $decrypted = "";
        $cipher = str_pad(dechex($char), 4, "0", STR_PAD_LEFT);
        foreach (str_split($cipher) as $index => $char) {
            $decrypted .= dechex(array_search($char, $this->key[$index]));
        }
        $decrypted = hexdec($decrypted);
        return $decrypted;
    }

    public function decryptAll()
    {
        $decrypted = "";
        $cipherArray = $this->splitUnicode($this->cipherText);

        foreach ($cipherArray as $char) {
            $char = IntlChar::ord($char);
            $decrypted .= IntlChar::chr($this->decrypt($char));
        }
        return $decrypted;
    }
    
    public function render()
    {
        if ($this->plainText) {
            $this->cipherToDecipher = $this->cipherText = $this->encryptAll();
        }

        if ($this->cipherToDecipher) {
            $this->decipheredText = $this->decryptAll();
        }

        return view('livewire.index');
    }
}
