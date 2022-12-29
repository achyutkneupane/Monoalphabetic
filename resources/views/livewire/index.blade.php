<div>
    <h1 class="mb-10 text-4xl text-center">Monoalphabetic Cipher</h1>
    <div class="flex flex-col gap-16 lg:flex-row">
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="plain-text">Plain Text</label>
                <input type="text" id="plain-text" class="w-full p-2 text-black border border-gray-300 rounded-md lg:w-96" wire:model="plainText">
            </div>
            <div class="flex flex-col gap-2">
                <label for="plain-text">
                    Cipher Text
                    {{-- (<a href="#" class="text-blue-500 hover:text-blue-700">Copy</a>) --}}
                </label>
                <input type="text" id="plain-text" class="w-full p-2 text-black border border-gray-300 rounded-md lg:w-96 disabled:bg-gray-300" wire:model="cipherText" disabled>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="plain-text">Cipher Text</label>
                <input type="text" id="plain-text" class="w-full p-2 text-black border border-gray-300 rounded-md lg:w-96" wire:model="cipherToDecipher">
            </div>
            <div class="flex flex-col gap-2">
                <label for="plain-text">Deciphered Text</label>
                <input type="text" id="plain-text" class="w-full p-2 text-black border border-gray-300 rounded-md lg:w-96 disabled:bg-gray-300" disabled wire:model="decipheredText">
            </div>
        </div>
    </div>    
</div>