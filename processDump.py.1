#!/usr/bin/env python
# -*- coding: utf-8 -*

import sys, datetime, csv

def read(dumppi):
	with open(dumppi, 'rb') as file:
		lista = list(csv.reader(file))
	return lista

def tulosta(lista):
	tilasto = {}
	total = 0
	for line in lista:
		aika = calculate(int(line[4]))
		print "ID: %s \nAINEISTO: %s \nTAPAUS: %s \nOSAKOHTEET: %s \nAIKA: %s \nKOMMENTTI: %s \nAIKALEIMA: %s" \
		% (line[0], line[1], line[2], line[3], aika, line[5], line[6])
		print "================"

		if (line[3] != ""):
			tapaus = line[1] + " : " + line[2] + " : " + line[3]
		else:
			tapaus = line[1] + " : " + line[2] + " : (ei osakohteita)"

		sekunnit = int(line[4])

		total += 1

		if not tapaus in tilasto:
			tilasto[tapaus] = [1, sekunnit, sekunnit, sekunnit, sekunnit] # määrä, keskiarvo, minimi, maksimi, summa
		else:
			tilasto[tapaus][0] += 1
			tilasto[tapaus][4] += sekunnit
			tilasto[tapaus][1] = tilasto[tapaus][4] / tilasto[tapaus][0]
			if (sekunnit < tilasto[tapaus][2]):
				tilasto[tapaus][2] = sekunnit
			if (sekunnit > tilasto[tapaus][3]):
				tilasto[tapaus][3] = sekunnit

	for key in sorted(tilasto):
		print key
		print "TAPAUKSIA: " + str(tilasto[key][0]) + " (" + str(round(float(tilasto[key][0]) / total * 100, 1)) + " %)"
		print "KESKIARVO: " + str(calculate(tilasto[key][1]))
		print "MINIMI: " + str(calculate(tilasto[key][2]))
		print "MAKSIMI: " + str(calculate(tilasto[key][3]))
		print "================"

def calculate(rivi):
	value = str(datetime.timedelta(seconds=rivi))
	return value

if __name__ == '__main__':
	dumppi = sys.argv[1]
	tiedosto = read(dumppi)
	tulosta(tiedosto)