#!/bin/bash

FILES=./*.jp*g

for f in $FILES
do
	echo "Processing $f. . . "
	convert $f -resize '450>' -quality 85 _LO/$f
done

# F=./00001.jpg
# 
# for (( i=10; i <= 20; i++))
# do 
# 	echo "$i Processing $F. . ."
# 	let "Q=$i*5"
# 	convert $F -resize '750' -quality $Q _LO/$F-$Q-750
# done