<?php

$k_view .= '
<div class="cNt-Bdy">
     <h2>Functions</h2>
          <div id="db_body">
            <aside id="ad_160x600">
              <script async="" src="../../../pagead2.googlesyndication.com/pagead/js/f.txt"></script>

       </aside>
            <div><p>Functions are compartmentalized segments of code that do not run until they are called to execute by an event, timer or some other mechanism. They also serve as constructors for all JavaScript <a href="Objects.html">objects</a>.</p>

    <h3>Write a basic function and call it to execute</h3>
    <code><b>function</b> myFunction(){
        alert(<span class="code-str">"Function was called to run"</span>);
    }
    <span class="code-comment">// call the <b>function</b> to run<br></span>myFunction();</code>

    <h3>Events can make a function run</h3>
    <code><span class="code-elem">&lt;script&gt;</span>
    <b>function</b> myFunction(){
        var status = document.getElementById(<span class="code-str">"status"</span>);
        status.innerHTML = <span class="code-str">"You just made my <b>function</b> run."</span>;
    }
    <span class="code-elem">&lt;/script&gt;</span>
    <span class="code-elem">&lt;input type=<span class="code-str">"button"</span> value=<span class="code-str">"Click Me"</span> onclick=<span class="code-str">"myFunction()"</span>&gt;</span>
    <span class="code-elem">&lt;h3 id=<span class="code-str">"status"</span>&gt;</span><span class="code-elem">&lt;/h3&gt;</span></code>
    <code><span class="code-elem">&lt;script&gt;</span>
    <b>function</b> myFunction(){
        var status = document.getElementById(<span class="code-str">"status"</span>);
        status.innerHTML = <span class="code-str">"The document finishing loading made my <b>function</b> run."</span>;
    }
    window.addEventListener(<span class="code-str">"load"</span>, myFunction);
    <span class="code-elem">&lt;/script&gt;</span>
    <span class="code-elem">&lt;h3 id=<span class="code-str">"status"</span>&gt;</span><span class="code-elem">&lt;/h3&gt;</span></code>

    <h3>Adding arguments</h3>
    <p>Arguments are an aspect of function creation that make them much more dynamic, useful and reusable. You can apply one or more arguments to your functions, if applying multiple arguments be sure to separate each by a comma.</p>
    <code><span class="code-elem">&lt;script&gt;</span>
    <b>function</b> myFunction(v1,v2,v3){
        var status = document.getElementById(<span class="code-str">"status"</span>);
        status.innerHTML = v2+<span class="code-str">" has known "</span>+v1+<span class="code-str">" for "</span>+v3+<span class="code-str">" years."</span>;
    }
    <span class="code-elem">&lt;/script&gt;</span>
    <span class="code-elem">&lt;p&gt;</span><span class="code-elem">&lt;input type=<span class="code-str">"button"</span> value=<span class="code-str">"Click Me"</span> onclick=<span class="code-str">"myFunction(<span class="code-str">\'Jo\'</span>,<span class="code-str">\'Ben\'</span>,7)"</span>&gt;</span><span class="code-elem">&lt;/p&gt;</span>
    <span class="code-elem">&lt;h3 id=<span class="code-str">"status"</span>&gt;</span><span class="code-elem">&lt;/h3&gt;</span></code>
    <p>Authors can optionally use the <a href="Arguments.html">Arguments</a> object to access arguments passed into functions. Data passed to them when they are called to run, does not need to be declared in between the parenthesis of a function.</p>
    <code><b>function</b> myFunction() {
        return arguments[0]+<span class="code-str">" | "</span>+arguments[1]+<span class="code-str">" | "</span>+arguments[2];
    }
    var result = myFunction(<span class="code-str">"dog"</span>, <span class="code-str">"cat"</span>, <span class="code-str">"bird"</span>);
    alert(result);</code>

    <h3>Anonymous functions</h3>
    <p>Anonymous functions are ones that have no name following the \'function\' declaration. They are most commonly used as a parameter provided to a method that expects executable code as one of its parameters. In class programming they are used to define custom methods in custom objects we create.</p>
    Provided as the second parameter to the addEventListener() method, which expects executable code as second parameter.
    <code>window.addEventListener(<span class="code-str">"click"</span>, <b>function</b>(){
        alert(<span class="code-str">"you clicked the window"</span>);	
    });</code>
    Provided as the first parameter to the setTimeout() method, which expects executable code as first parameter.
    <code>setTimeout( <b>function</b>(){
        alert(<span class="code-str">"your 3 seconds are up"</span>);
    }, 3000 );</code>
    Provided as the value to a custom method in a custom object.
    <code><b>function</b> MyClass(){
        this.property1 = 25;
        this.method1 = <b>function</b>(){
            alert(<span class="code-str">"method 1 called to run"</span>);
        }
    }
    var instance = new MyClass();
    instance.method1();</code>

    <h3>Stop a function and optionally return data</h3>
    <p>The <a href="return.html">return</a> statement is used to stop a function from processing and optionally return data back to the calling code. The function will stop processing at that point and data can be optionally passed back to the code that called the function to run.</p>
    <code><b>function</b> doIt( a, b ){
        return a + b;	
    }
    var result = doIt( 3, 2 );
    alert(result);</code>
    <code><b>function</b> doIt( x ){
        if( x &lt; 10 ){
            alert(<span class="code-str">"argument must be 10 or greater"</span>);
            return false;
        }
        return x / 2;
    }
    var result = doIt( 7 );</code></div>
          </div>
</div>
';
?>