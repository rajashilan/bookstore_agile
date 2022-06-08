<div>
    <div class='container-fluid px-4'>
        <div class="container">
            <div class='card mt-4'>
                <div class='card-header'>
                    <h2>Add New Book
                        <a href="{{ route('listbook') }}" class='btn btn-primary btn-sm float-end' style='marginTop:8px'>All Books</a>
                    </h2>
                </div>
                <div class='card-body'>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @elseif (Session::has('loginmessage'))
                    <div class="alert alert-danger" role="alert">{{Session::get('loginmessage')}}</div>
                    @endif
                    <form encType='multipart/form-data' wire:submit.prevent="addBook">
                        <div class="row">
                            <div class='form-group mb-3 col-md-6'>
                                <label>Book Title</label>
                                <input type='text' name="title" class='form-control' wire:model="title" required/>
                            </div>
                            <div class='form-group mb-3 col-md-6'>
                                <label>Book Author</label>
                                <input type='text' name="author" class='form-control' wire:model="author" required/>
                            </div>
                            <div class='form-group mb-3 col-md-6'>
                                <label>ISBN-13 Number</label>
                                <input type='text' name="isbn" class='form-control' wire:model="isbn" required/>
                            </div>
                            <div class='form-group mb-3 col-md-6'>
                                <label>Description</label>
                                <textarea name='description' class='form-control' wire:model="description" required></textarea>
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label>Book Category</label>
                                <select name='category' class='form-control' wire:model="category" required>
                                    <option>Select Category</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Children">Children</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Mystery">Mystery</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Sci-Fi">Sci-Fi</option>
                                </select>
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label>Publication Date</label>
                                <input type='date' name="publication_date" class='form-control' wire:model="publication_date" required/>
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label>Image</label>
                                <input type='file' accept="image/*" name="image" class='form-control' wire:model="image" required/>
                                @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" />
                                @endif
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label for="trade" class="form-label">Trade Price</label>
                                <div class="slider">
                                    <input type="range" class="form-range slider" id="trade" min="1" max="100" step="1" value="1" oninput="trade_price.value = this.value"  >
                                    <input type="text" id="trade_price" name="trade_price" class='form-control'  style="width: 60px" wire:model="trade_price"  oninput="trade.value = this.value" required />
                                </div>
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label for="retail" class="form-label">Retail Price</label>
                                <div class="slider" >
                                    <input type="range" class="form-range slider" id="retail" min="1" max="100" step="1" value="1" oninput="retail_price.value = this.value"  >
                                    <input type="text" id="retail_price" name="retail_price" class='form-control'  style="width: 60px" wire:model="retail_price" required oninput="retail.value = this.value"/>
                                </div>
                            </div>
                            <div class='form-group mb-3 col-md-4'>
                                <label for="qty" class="form-label">Quantity</label>
                                <div class="slider">
                                    <input type="range" class="form-range slider" id="qty" min="1" max="20" step="1" value="1" oninput="quantity.value = this.value"  >
                                    <input type="text" id="quantity" name="quantity" class='form-control'  style="width: 60px" wire:model="quantity" oninput="qty.value = this.value" required/>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type='submit' class='btn btn-primary px-4 mt-2' >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



