<div>

    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Slide</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Edit Slide</li>
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
                                        <div class="col-md-6">Edit Slide</div>
                                        <div class="col-md-6">
                                            <a class="btn btn-info pull-right" href="{{ route('admin.slider') }}">All Slides</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="updateSlide">
                                        @csrf
                                        {{-- title --}}
                                        <div class="form-group">
                                            <label for="title" class="control-label col-sm-3">Title: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="title" wire:model="title" >
                                                @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        {{-- New Image --}}
                                        <div class="form-group">
                                            <label for="newImage" class="control-label col-sm-3">New Image: </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="newImage" wire:model="newImage" class="form-control-file">
                                                @error('newImage') <p class="text-danger">{{$message}}</p> @enderror
                                                @if ($newImage)
                                                    <img src="{{ $newImage->temporaryUrl() }}" width="60">
                                                @else
                                                    <img src="{{ asset('images/slider') }}/{{ $image }}" width="60">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- Status --}}
                                        <div class="form-group">
                                            <label for="status" class="control-label col-sm-3">Status: </label>
                                            <div class="col-sm-9">
                                                <select name="status" wire:model="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-right">Update Slide</button>
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
