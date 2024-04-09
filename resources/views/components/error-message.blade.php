@props(["name"])
@error($name)
<div class="alert alert-danger">
    <div>{{ $message }}</div>
</div>
@enderror
