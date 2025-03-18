<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <input type="text" name="name" value="{{ isset($coupon) ? $coupon->name : '' }}" required="required">
        <label for="input" class="control-label">Please Enter Coupon Name</label><i class="bar"></i>
            @error('name')
            <div class="error_message">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="discount" value="{{ isset($coupon) ? $coupon->discount : '' }}" required="required">
            <label for="input" class="control-label">Please Enter Coupon Discount (%)</label><i class="bar"></i>
            @error('discount')
            <div class="error_message">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>