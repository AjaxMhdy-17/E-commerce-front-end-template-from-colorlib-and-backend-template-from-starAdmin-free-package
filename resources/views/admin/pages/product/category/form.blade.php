<div class="form-group">
    <input type="text" name="name" value="{{$category->name}}" required="required">
    <label for="input" class="control-label">Please Enter Category Name</label><i class="bar"></i>
    @error('name')
    <div class="error_message">{{ $message }}</div>
    @enderror
</div>