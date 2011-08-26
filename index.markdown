---
title: Click On Tyler
layout: default
---
<div id="bd"> 
	<div class="yui-gb band1"> 
		<h2>Mac Apps</h2>
        <div class="yui-u first center"> 
			<a href="/virtualhostx/"><img src="{{ site.cdn_url }}/images/virtualhostx-band1.png" class="nudgeme" width="169" height="133"></a> 
			<p class="center"><a href="/virtualhostx/">VirtualHostX</a></p> 
	    </div> 
        <div class="yui-u center"> 
			<a href="/incoming/"><img src="{{ site.cdn_url }}/images/incoming-band1.png" class="nudgeme" width="169" height="133"></a> 
			<p class="center"><a href="/incoming/">Incoming!</a></p> 
	    </div> 
        <div class="yui-u center"> 
            <a href="/nottingham/"><img src="{{ site.cdn_url }}/images/nottingham-band1.png" class="nudgeme" width="169" height="133"></a> 
            <p class="center"><a href="/nottingham/">Nottingham</a></p> 
        </div>
	</div> 
			
	<div class="yui-g band2"> 
		<h2>Welcome</h2> 
		<p><em>After a three year adventure working for Yahoo! in San Francisco, I'm now back in Nashville doing
			Mac and iOS development full-time.</em> This is my personal website, which is not in any way
			affiliated with my employer. Feel free to give one of my Mac apps a try or browse through
			<a href="http://github.com/tylerhall">my open source code</a> and <a href="/projects/">past projects</a>.
			If you'd like to <a href="/contact/">contact me</a>, go ahead, but please
			know that recruiters who cold-call my office phone will be mocked. Just sayin'.</p> 
	</div> 

	<div class="yui-g band3"> 
		<h2>Recent Blog Posts <a href="http://feeds.feedburner.com/clickontyler"><img src="{{ site.cdn_url }}/images/feed-icon-14x14.png" width="14" height="14"></a></h2> 
	</div> 
	
	<div class="yui-gb band4">
		{% for i in (0..2) %}
		<div class="yui-u first">
			<h3>{{ site.posts[i].date | date: "%B -%d" | downcase | remove:'-0' | remove:'-' }}</h3>
			<h4><a href="{{ site.posts[i].url | replace:'index.html','' }}">{{ site.posts[i].title }}</a></h4>
		</div>
		{% endfor %}
	</div>
</div>
