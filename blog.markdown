---
title: Blog - Click On Tyler
layout: default
permalink: /blog/index.html
slug: blog
---
<div id="bd" class="blog">
	<div class="yui-g band1">
		<h2>Blog Posts</h2>
		<ul>
		{% for item in site.posts %}
		<li><a href="{{ item.url | replace:'index.html','' }}">{{ item.title }}</a> &mdash; <span style="font-size:smaller; font-style:italic;">{{ item.date | date: "%B -%d, %Y" | remove:'-0' | remove:'-' }}</span></li>
		{% endfor %}
		</ul>		
	</div>
</div>
