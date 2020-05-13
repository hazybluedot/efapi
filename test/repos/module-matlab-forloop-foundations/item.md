---
title: 'For-loop Foundations'
morea_type: module
morea_id: module-matlab-forloop-foundations
published: true
---
<div class="html5-video" id="screencap-matlab-forloop-intro"
           data-file="/ef105-2019-08/modules/video/matlab-iteration/ForLoopIntro"></div>

The syntax for a for-loop is

```
for value = values
    % statements
end
```

We call the variable named on the left-side of the equal sign the 'loop variable', in the above example it is named `value`. The value stored in this variable changes each time through the loop. The *statements* after the `for` loop and before the `end` keyword are said to be in the *body* of the loop. These statements are what will be evaluated each time through the loop. Only statements that depend on the value of the loop variable should be included in the body of the loop.

# Two Foundational Patterns

There are two foundational patterns for implementing a `for` loop in MATLAB:

1. For-Each Value Pattern

    Using this pattern, the loop variable takes on each value that you need to perform some calculation on.

    ```
    values = randi(10, 1, 20); % stand-in for real data
    for value = values
        % do something with value
    end
    ```

    Use this method if the calculation you need to perform on each value only requires knowledge of the value itself.
      
2. Indexing Pattern

    Using this pattern, the loop variable is an index that is used to index into a list of values to retrieve a value that you need to perform some calculation on. Avoid this pattern unless you know you need it for your situation.

    ``` matlab
    values = randi(10, 1, 20); % stand-in for real data
    for idx = 1:length(values)
        % do something with both idx, AND values(idx)
    end
    ```

    Use this pattern if the calculation you need to perform on each
value in the list requires knowing what position that value is in the
original list. Before settling on this method, ask yourself "Do I
*really* need to know the index of each value in my list to complete
this task?", and if the answer is "no", then switch to the for-each
pattern.

# General Strategy

~~~ aside Be Mindful of Internet Search Results
This is a case where your internet search may not always return the best results for a given situation. If you do an internet search for "In MATLAB, how to evaluate an equation for each value in a vector", you will likely see results that use a `for` loop. While this is *a* solution, it is not a *good* solution when MATLAB's native handling of vectorized calculations would do the same job with fewer lines of code. It takes a bit of practice and experience to develop good internet search skills to write a search query, and identify an appropriate result.

This is especially relevant for folks who have some experience in languages such as C/C++ or Java. If you use a for-loop for a particular task in one of those languages, it is natural to think you will need a for-loop to complete the same task in matlab and then search for "How do I write a for loop in MATLAB". Instead, try searching for *what* you are trying to accomplish, for example "how do I sum the values in a vector in MATLAB", not *how* you would accomplish it in another language.
~~~

We would like to strive for code that is both as simple as it can be for a given task, and is as readable as possible for a given task. With this in mind, when you encounter a situation that could be implemented with a loop, first ask: "Do I really need a loop here?". MATLAB is built around the idea of iterating over values in vectors and matrices as a basic concept. As an example, calculating a mathematical expression for each value in an array *could* be implemented as a loop. Consider the following example which calculates the x-component for each pair of distance and direction values in a list:

``` matlab
direction = [15 25 12 45]; 
distance =  [10  5  8 12];

x = nan(1, length(direction));
for idx = 1:length(direction)
    x(idx) = distance(idx)*cosd(direction(idx));
end
```

As we have seen, this type of operation is much simpler to express as
a vectorized calculation in which MATLAB handles the iteration for us:

```
direction = [15 25 12 45]; 
distance =  [10  5  8 12];

x = distance.*cosd(direction);
```

Both produce the same result, but what took 4 lines of code, and the
use of an indexing variable `idx`, can be done in a single line of
code, without the complexity of an indexing variable. Always opt for a
non-loop solution if one exists!
