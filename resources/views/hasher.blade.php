@extends('layouts.app')

@section('content')


@if (isset($words))
<form action="/hasher" method='post'>
    @csrf
    <table class="table table-striped">
        <tbody>
            @foreach ($words as $word)
                <tr id="{{ $word['word'] }}">
                    <th class="key"> {{ $word['word'] }} </th>
                    <td>
                    <input type="radio" id="contactChoice1"
                     name="{{ $word['word'] }}" value="md5">
                   <label for="contactChoice1">MD5</label></th>
                    <th>
                    <input type="radio" id="contactChoice2"
                     name="{{ $word['word'] }}" value="sha1">
                    <label for="contactChoice2">SHA1</label></th>

                    <th>
                    <input type="radio" id="contactChoice3"
                     name="{{ $word['word'] }}" value="ripemd160">
                    <label for="contactChoice3">Ripemd160</label></th>

                    <th>
                    <input type="radio" id="contactChoice3"
                     name="{{ $word['word'] }}" value="sha256">
                    <label for="contactChoice3">SHA256</label></th>

                    <th>
                    <input type="radio" id="contactChoice3"
                     name="{{ $word['word'] }}" value="sha512">
                    <label for="contactChoice3">SHA512</label></th>

                    <th>
                        <input type="text" name="{{ 'hash_'.$word['word'] }}">
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
<input type="submit">
</form>
@endif
@endsection
