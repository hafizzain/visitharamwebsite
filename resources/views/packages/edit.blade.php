@extends('layouts.app')
@isset($package)
    @section('title', 'Edit package')
@else
    @section('title', 'Add New Package')
@endisset
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    @isset($package)
                        <h4 class="mb-sm-0 font-size-18">Edit  Package</h4>
                    @else
                        <h4 class="mb-sm-0 font-size-18">Add New Package</h4>
                    @endisset
                    {{--                {{ $errors }}--}}
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Package</li>
                            @isset($package)
                                <li class="breadcrumb-item active">Edit Package</li>
                            @else
                                <li class="breadcrumb-item active">Add New Package</li>
                            @endisset
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 rounded cShadow container-fluid">
        @isset($package)
            <form action="{{ route('update.package', $package->id) }}" method="post" enctype="multipart/form-data">
                @else
                    <form action="{{ route('insert.package') }}" method="post" enctype="multipart/form-data">
                        @endisset
                        @csrf


                        <div class="row">

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="name" @isset($package)value="{{$package->name}}" @endisset placeholder="Enter Name">
                                </div>
                                @error('name')
                                <span class="invalid-feedback mt-0" @error('name')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Days<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" required class="form-control" name="days" @isset($package)value="{{$package->days}}" @endisset placeholder="Enter Days">
                                </div>
                                @error('days')
                                <span class="invalid-feedback mt-0" @error('days')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Nights<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" required class="form-control" name="nights" @isset($package)value="{{$package->nights}}" @endisset placeholder="Enter Nights">
                                </div>
                                @error('nights')
                                <span class="invalid-feedback mt-0" @error('nights')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Price<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" required class="form-control" name="price" @isset($package)value="{{$package->price}}" @endisset placeholder="Enter Price">
                                </div>
                                @error('price')
                                <span class="invalid-feedback mt-0" @error('price')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-sm-6 mb-2">
                                <label for="">Description</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="description" @isset($package)value="{{$package->description}}" @endisset placeholder="Enter Description">
                                </div>
                                @error('description')
                                <span class="invalid-feedback mt-0" @error('description')style="display: block" @enderror role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for=""> Hotel<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select required class="form-control" name="package_id">
                                        <option value="">Select Hotel</option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}" @isset($package) @if ($package->hotel_id == $hotel->id) selected @endif @endisset>{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('hotel_id')
                                <span class="invalid-feedback mt-0" @error('hotel_id') style="display: block" @enderror role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label for="images">Images</label>
                                <input type="file" class="form-control" name="files[]" id="images" multiple>

                                @if(isset($package) && $package->media->count() > 0)
                                    <div class="mt-3">
{{--                                        <p>Existing Images:</p>--}}
                                        @foreach($package->media as $image)
                                            <img src="{{ url($image->file) }}" alt="Image" style="    width: 150px;
    height: 120px;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-sm-6 mb-2 d-flex align-items-end">

                                <label for="switch4" data-on-label="Yes" data-off-label="No">
                                    <label for="">Status: </label>
                                    <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">

                                        <input class="form-check-input" name="status" type="checkbox" id="SwitchCheckSizelg" @if(isset($package) && $package->active == 1) checked="" @endif>
                                    </div>
                                </label>
                            </div>






                            <div class="form-group col-sm-12 mb-2">
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                            </div>

                        </div>
                    </form>
    </div>
@endsection
