<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="car-header">
                    <h4> Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-primary float -end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $item)
                                    <option
                                        value="{{ $item->id }}"{{ $product->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label>Product Price</label>
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
