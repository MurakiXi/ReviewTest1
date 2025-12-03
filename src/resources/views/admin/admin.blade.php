@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('title', 'Admin')
@section('body_class', 'body-admin')

@section('content')
<div class="auth-header">
    <div class="auth-header__logo">
        <h2>Admin</h2>
    </div>
</div>
<section class="admin">
    <div class="admin-content">
        <div class="search-form__inner">
            <form action="{{ route('admin.search')}}" class="search-form" method="POST">
            @csrf
                <input type="text" class="search-form__item-input" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
                <select name="gender" class="search-form__item-select">
                    <option value="" {{ old('gender') === null || old('gender') === '' ? 'selected' : '' }}>性別</option>
                    <option value="all" {{ old('gender') === 'all' ? 'selected' : '' }}>全て</option>
                    <option value="1"   {{ old('gender') === '1'   ? 'selected' : '' }}>男性</option>
                    <option value="2"   {{ old('gender') === '2'   ? 'selected' : '' }}>女性</option>
                    <option value="3"   {{ old('gender') === '3'   ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id" class="search-form__item-select">
                    <option value="" {{ old('category_id') === null || old('category_id') === '' ? 'selected' : '' }}>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}
                    </option>
                    @endforeach
                </select>
                <input type="date" class="search-form__item-input" name="updated_at" value="{{ old('updated_at') }}">
                <div class="search-form__button">
                    <button class="search-form__button--search" type="submit">検索</button>
                    <button type="submit" formaction="{{ route('admin.reset') }}" class="search-form__button--reset">リセット</button>
                </div>
            </form>
        </div>
        <div class="search-form__index">
            <form method="GET" action="{{ route('admin.export') }}" class="search-form__export">
                <button class="search-form__export-button-submit" type="submit">エクスポート</button>
            </form>
            <div class="search-form__pagination">
                {{ $contacts->appends(request()->only(['keyword', 'gender', 'category_id', 'updated_at']))->links() }}
            </div>
        </div>
        <div class="result-table">
            <table class="result-table__inner">
                <tr class="result-table__row--header">
                    <th class="result-table__header">お名前</th>
                    <th class="result-table__header">性別</th>
                    <th class="result-table__header">メールアドレス</th>
                    <th colspan="2" class="result-table__header">お問い合わせの種類</th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="result-table__row">
                    <td class="result-table__item">{{ $contact->name}}</td>
                    <td class="result-table__item">{{ $contact->gender_label }}</td>
                    <td class="result-table__item">{{ $contact->email}}</td>
                    <td class="result-table__item">{{ $contact->category->content}}</td>
                    <td class="result-table__item">
                        <a href="{{ route('admin.show', $contact->id) }}" class="result-table__item-detail">
                            詳細
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

</section>
@endsection
