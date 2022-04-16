@php
    $socialIcons = getContent('social_icon.element');
    $footer = getContent('footer.content', true);
    $allPolicy = getContent('policy_pages.element');
@endphp
<!-- Footer Section -->
<footer>
    <div class="container">
        <div class="footer-top pt-80 pb-4">
            <div class="logo footer-logo">
                <a href="{{ route('home') }}">
                    <img src="" alt="@lang('logo')">
                </a>
            </div>
            <div class="footer__txt">
                <p>
                    {{ __(@$footer->data_values->text) }}
                </p>
            </div>
            <ul class="footer-links">
                <li>
                    <a href="{{ route('home') }}">@lang('Home')</a>
                </li>
                @foreach ($allPolicy as $singlePolicy)
                <li>
                    <a href="{{ route('policy.page', ['slug'=>slug($singlePolicy->data_values->title), 'id'=>$singlePolicy->id]) }}" target="_blank">
                        {{ __($singlePolicy->data_values->title) }}
                    </a>
                </li>
                @endforeach
                <li>
                    <a href="{{ route('contact') }}">@lang('Contact')</a>
                </li>
            </ul>
        </div>
        <div class="footer-bottom d-flex flex-wrap-reverse justify-content-between align-items-center py-3">
            <div class="copyright">
                {{ __(@$footer->data_values->copy_right_text) }}
            </div>
            <ul class="social-icons">

            @foreach($socialIcons as $icon)
                <li>
                    <a href="{{ $icon->data_values->url }}" target="_blank">
                        @php
                            echo $icon->data_values->social_icon;
                        @endphp
                    </a>
                </li>
            @endforeach

            </ul>
        </div>
    </div>
</footer>
<!-- Footer Section -->
