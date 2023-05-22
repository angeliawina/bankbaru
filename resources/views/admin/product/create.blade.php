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
                    <form action="{{ url('admin/products') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label>Product Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
