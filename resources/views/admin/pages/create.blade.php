@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($errors->all() as $message)
                    {{$message}}
                @endforeach
                <form class="" action="{{route('admin.pages.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" id="summary" name="summary" class="form-control" value="{{old('summary')}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" id="body" class="form-control" rows="10" cols="30">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(!empty(old('category_id'))) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <h3>Tags</h3>
                            @foreach ($tags as $key => $tag)
                                <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                                <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}" {{(!empty(old('tags.'.$key))) ? 'checked' : ''}}>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <h3>Photos</h3>
                            @foreach ($photos as $photo)
                                <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
                                <input type="checkbox" name="photos[]" id="photos-{{$photo->id}}" value="{{$photo->id}}">
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="salva">
                </form>
            </div>
        </div>
    </div>
