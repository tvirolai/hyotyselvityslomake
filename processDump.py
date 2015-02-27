#!/usr/bin/env python
# -*- coding: utf-8 -*

import sys, datetime, csv

def read(dumppi):
	with open(dumppi, 'rb') as file:
		lista = list(csv.reader(file))
	return lista

def tulosta(lista):
	for line in lista:
		try:
			aika = calculate(int(line[4]))
		except:
			aika = "(ei oo)"
		print "ID: %s \nAINEISTO: %s \nTAPAUS: %s \nOSAKOHTEET: %s \nAIKA: %s \nKOMMENTTI: %s \nAIKALEIMA: %s" \
		% (
			line[0], line[1], line[2], line[3], aika, line[5], line[6])
		print "================"

def calculate(rivi):
	value = str(datetime.timedelta(seconds=rivi))
	return value

if __name__ == '__main__':
	dumppi = sys.argv[1]
	tiedosto = read(dumppi)
	tulosta(tiedosto)