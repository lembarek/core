<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">{{ trans('core::navigation.siteName') }}</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @foreach(trans('core::navigation.links') as $link)
                <li><a href="{{ $link['url'] }}">{{ $link['name']  }}</a></li>
            @endforeach
        </ul>
    </div><!--/.nav-collapse -->
    </div>
</div>
