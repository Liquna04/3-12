<div>This is header</div>
<a class=" {{ request()->is('/') ? 'active': ''}} " href="/">Home</a>
<a class=" {{ request()->is('about') ? 'active': ''}} " href="about">Welcome</a>