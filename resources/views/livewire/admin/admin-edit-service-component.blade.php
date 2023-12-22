<div>

    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Edit Service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">Edit Service</div>
                                        <div class="col-md-6">
                                            <a class="btn btn-info pull-right" href="{{ route('admin.all_services') }}">All Services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" action="" wire:submit.prevent="updateService">
                                        @csrf
                                        {{-- name --}}
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" wire:model="name" wire:keyup="generateSlug" class="form-control">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- slug --}}
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Slug: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="slug" wire:model="slug" class="form-control">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- tagline --}}
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Tagline: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="slug" wire:model="tagline" class="form-control">
                                                @error('tagline') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- service category --}}
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Service Category: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="service_category_id">
                                                    <option value="">Select Service Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_category_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- price --}}
                                        <div class="form-group">
                                            <label for="price" class="control-label col-sm-3">Price: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="price" wire:model="price" class="form-control">
                                                @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- discount --}}
                                        <div class="form-group">
                                            <label for="discount" class="control-label col-sm-3">Discount: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="discount" wire:model="discount" class="form-control" id="discount">
                                                @error('discount') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- discount type --}}
                                        <div class="form-group">
                                            <label for="discount_type" class="control-label col-sm-3">Discount Type: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="discount_type" id="discount_type">
                                                    <option value="">Select Discount Type</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('discount_type') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- featured type --}}
                                        <div class="form-group">
                                            <label for="featured" class="control-label col-sm-3">Featured: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" wire:model="featured" id="featured">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- description --}}
                                        <div class="form-group">
                                            <label for="description" class="control-label col-sm-3">Description: </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" wire:model="description"></textarea>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- Inclusion --}}
                                        <div class="form-group">
                                            <label for="inclusion" class="control-label col-sm-3">Inclusion: </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" wire:model="inclusion"></textarea>
                                                @error('inclusion') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- Exclusion --}}
                                        <div class="form-group">
                                            <label for="exclusion" class="control-label col-sm-3">Exclusion: </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" wire:model="exclusion"></textarea>
                                                @error('exclusion') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- thumbnail --}}
                                        <div class="form-group">
                                            <label for="newThumbnail" class="control-label col-sm-3">Thumbnail: </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="newThumbnail" wire:model="newThumbnail" class="form-control-file">
                                                @error('newThumbnail') <p class="text-danger">{{$message}}</p> @enderror
                                                @if ($newThumbnail)
                                                    <img src="{{ $newThumbnail->temporaryUrl() }}" width="60" alt="">
                                                @else
                                                    <img src="{{ asset('images/services/thumbnails') }}/{{$thumbnail}}" width="60" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Image --}}
                                        <div class="form-group">
                                            <label for="newImage" class="control-label col-sm-3">Image: </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="newImage" wire:model="newImage" class="form-control-file">
                                                @error('newImage') <p class="text-danger">{{$message}}</p> @enderror
                                                @if ($newImage)
                                                    <img src="{{ $newImage->temporaryUrl() }}" width="60" alt="">
                                                @else
                                                    <img src="{{ asset('images/services') }}/{{$image}}" width="60" alt="">
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success pull-right">Update Service</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
