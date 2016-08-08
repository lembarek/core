<div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <ul class="list-inline text-center ">
          <li>
            <a href="{{ url('rss') }}" data-toggle="tooltip"
               title="RSS feed">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li>
              <a href="https://twitter.com/{{config('blog.twitter_name')}}" data-toggle="tooltip"
               title="My Twitter Page">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li>
              <a href="https://www.facebook.com/{{config('blog.facebook_name')}}" data-toggle="tooltip"
               title="My Facebook Page">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li>
              <a href="https://www.google.com/{{config('blog.google_plus_name')}}" data-toggle="tooltip"
               title="My Google+ Page">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li>
              <a href="http://www.linkedin.com/in/{{config('blog.linkedin_name')}}/" data-toggle="tooltip"
               title="My LinkedIn Page">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li>
              <a href="https://github.com/{{config('blog.githup_name')}}" data-toggle="tooltip"
               title="My GitHub Pages">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted">Copyright © {{ config('blog.author') }}</p>
</div>
