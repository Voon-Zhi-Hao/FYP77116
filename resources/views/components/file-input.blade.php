<div class="relative">
    <label for="{{ $id }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    
    <input type="file" id="{{ $id }}" name="{{ $name }}" class="mt-1 block w-full rounded-md bg-gray-100 p-2 text-sm text-gray-700 border border-gray-300 cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 hover:bg-gray-200" accept="{{ $accept ?? 'image/*' }}">
    
    <span class="text-xs text-gray-500 absolute top-0 right-0 mt-1 mr-4" x-show="selectedFile">
        @{{ selectedFile.name }}
    </span>
    
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>

<script>
document.addEventListener('alpine:init', () => {
    this.selectedFile = null;

    this.$watch('selectedFile', (file) => {
        if (file) {
            this.$refs.fileInput.value = ''; // Clear the file input after selection
        }
    });
});
</script>
