---
date: 2007-11-01 07:16:19
title: 50 States Programming Puzzle
layout: post
permalink: /blog/2007/11/50-states-programming-puzzle/index.html
slug: 50-states-programming-puzzle
---
Anders Pearson posted an interesting [programming puzzle](http://thraxil.org/users/anders/posts/2007/10/30/A-Simple-Programming-Puzzle-Seen-Through-Three-Different-Lenses/)
today on [Thraxil.org](http://thraxil.org/).

> Take the names of two U.S. States, mix them all together, then
> rearrange the letters to form the names of two other U.S. States. What states
> are these?

He found out about it from [Mark Nelson](http://marknelson.us/2007/04/01/puzzling/) who, in turn, heard it on
NPR. It's not a terribly difficult riddle if you take a moment to think about
it. But from a programmer's perspective it smells like one of the many brain
teasers we face in early Computer Science exams or job interviews. The puzzle
isn't so much about being the first person with the correct answer or even
getting the right answer at all. These problems are designed to reveal how you
approach them. They're designed to show how you think.

That's what intrigued me so much about Anders' post. He used it as an
opportunity to compare programming styles between low and high level languages
(and, by extension, how low and high level programmers think). In this case,
Nelson solved the problem in C++ using STL libraries. (Damn.) Anders wrote his
solution in Python.

Both solutions are valid. Each arrives at the same answer. However the ease at
which the solution is attained is radically different - not only in time spent
writing the program but also in the readability of the code.

I see this dynamic every day in the code I write. My day job uses PHP, but at
night I'm programming in Objective-C. I'm still a novice at ObjC and Cocoa
(although I do have a strong C/C++ background), so perhaps inexperience is
clouding my judgement, but there are so many times where I find myself longing
for the flexibility of a high level, scripting language.

In any case, here's my analogous solution to the 50 States problem using PHP.
(For obvious reasons, my code is nearly line by line identical to Anders'
Python solution.)

{% highlight php  %}
<?PHP
    $states = array("alabama","alaska","arizona","arkansas","california","colorado",
        "connecticut","delaware","florida","georgia","hawaii","idaho",
        "illinois","indiana","iowa","kansas","kentucky","louisiana",
        "maine","maryland","massachusetts","michigan","minnesota",
        "mississippi","missouri","montana","nebraska","nevada",
        "newhampshire","newjersey","newmexico","newyork","northcarolina",
        "northdakota","ohio","oklahoma","oregon","pennsylvania","rhodeisland",
        "southcarolina","southdakota","tennessee","texas","utah","vermont",
        "virginia","washington","westvirginia","wisconsin","wyoming");
    
    $data = array();
    
    foreach($states as $state1)
    {
        foreach($states as $state2)
        {
            if($state1 == $state2) continue;
    
            $letters = array();
            $str     = $state1 . $state2;
    
            for($k = 0; $k < strlen($str); $k++)
                $letters[] = $str[$k];
    
            sort($letters);
            $sorted = implode($letters);
    
            if(isset($data[$sorted]))
            {
                list($s1, $s2) = $data[$sorted];
                if($s1 != $state2 || $s2 != $state1)
                    exit("$s1, $s2 and $state1, $state2\n");
            }
            else
                $data[$sorted] = array($state1, $state2);
        }
    }
    
    echo "No pairs found\n";
{% endhighlight %}
