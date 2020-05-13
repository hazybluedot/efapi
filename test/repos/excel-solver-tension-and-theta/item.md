---
title: 'Exercise 1 - Tension and Theta'
morea_id: excel-solver-tension-and-theta
morea_type: experience
published: true
---
<figure class="figure pull-right">
	<img class="figure-img img-fluid" src="pix/ef152-hw211.png" alt="A person pulls on a rope at point B. The rope is attached to the center of a pulley at point A. A second rope goes through the pulley with ends attaching to a tree at points C and D. The angle between horizontal and cord AD is 17 degrees, the angle between horizontal and B is 38 degrees. The angle between CAD is labeled 'theta'" />
	<figcaption>F<sub>AB</sub> = 65 lbs, find tension in rope CAD</figcaption>
</figure>

Go to worksheet "Exercise 1". Consider the homework problem
to the right. A helpful EF student posted the correct equations on the
EF151 discussion board:

$$\begin{array}{c}
T\cos(180-17) + T\cos(180-17-\theta) + 65\cos(360-38) &= 0\\ 
T\sin(180-17) + T\sin(180-17-\theta) + 65\sin(360-38) &= 0
\end{array}$$

Use the solver to find T and θ. Be careful not to use the name 'theta' since it is used in another sheet. Don't forget to use the `RADIANS` function.

Try it on your own first, but if you get stuck, check your formulas here:\
![](pix/exercise1-alt.jpg)

Answers should be <samp>$\theta=42^{\circ}$</samp> and <samp>T=34.8 lb</samp> <!-- {.result} -->
