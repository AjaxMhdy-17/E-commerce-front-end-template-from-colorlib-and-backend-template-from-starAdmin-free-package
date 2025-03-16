<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <input type="file" hidden name="brand_img" id="brand_img" accept="image/*">
            <input type="hidden" name="existing_brand_img" id="existing_brand_img" value="{{ isset($brand) ? $brand->brand_img : '' }}">

            <label for="brand_img" class="custom-file-label">Upload Your Brand Images</label>

            <div class="preview-container" id="preview-container" style="{{ isset($brand) && $brand->brand_img ? 'display: block;' : 'display: none;' }}">
                <img id="brand_img_preview" src="{{ isset($brand) && $brand->brand_img ? asset($brand->brand_img) : '' }}" alt="Uploaded Image">
                <img id="default_img_preview" src="https://tpc.googlesyndication.com/simgad/11292242217618016428" alt="Default Image" style="display: none;">
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group">
            <input type="text" name="brand_name" value="{{ isset($brand) ? $brand->brand_name : '' }}" required="required">
            <label for="brand_name" class="control-label">Please Enter Category Name</label><i class="bar"></i>
            @error('brand_name')
            <div class="error_message">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

@push('style')
<style>
    .custom-file-label {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .preview-container {
        margin-top: 10px;
    }

    .preview-container img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
    }
</style>
@endpush

@push('script')


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('brand_img');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('brand_img_preview');
        const defaultImage = document.getElementById('default_img_preview');
        const existingImageInput = document.getElementById('existing_brand_img');

        // Function to check and toggle images
        function toggleImages() {
            if (previewImage.src && previewImage.src !== window.location.origin + "/") {
                // If brand_img_preview has a valid image
                previewImage.style.display = 'block';
                defaultImage.style.display = 'none';
            } else {
                // If brand_img_preview has no image
                previewImage.style.display = 'none';
                defaultImage.style.display = 'block';
            }
        }

        // Initial check on page load
        toggleImages();

        // Handle file input change
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                    toggleImages(); // Toggle images after setting new image
                    existingImageInput.value = ''; // Clear the existing image path
                };
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, reset the preview image and toggle visibility
                previewImage.src = '';
                toggleImages();
            }
        });
    });
</script>


@endpush