#!/usr/bin/env python
# -*- coding: utf-8 -*

import datetime, csv, argparse

class Processor(object):

	def __init__(self, dumppi):
		with open(dumppi, 'rb') as file:
			self.lista = list(csv.reader(file))
		
	def tulosta(self):
		for line in self.lista:
			aika = self.calculate(int(line[4]))
			print "ID: %s \nAINEISTO: %s \nTAPAUS: %s \nOSAKOHTEET: %s \nAIKA: %s \nKOMMENTTI: %s \nAIKALEIMA: %s" \
			% (line[0], line[1], line[2], line[3], aika, line[5], line[6])
			print "================"

	def tilastot(self):
		tilasto = {}
		total = 0
		for line in self.lista:			
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
		
		print "SYÖTETTYJÄ TIETUEITA: %d\nERILAISIA KUVAILUTAPAUKSIA: %d\n" % ( total, len(tilasto) )

		for key in sorted(tilasto):
			print key
			print "TAPAUKSIA: " + str(tilasto[key][0]) + " (" + str(round(float(tilasto[key][0]) / total * 100, 1)) + " %)"
			print "KESKIARVO: " + str(self.calculate(tilasto[key][1]))
			if ((tilasto[key][0]) > 1):
				print "MINIMI: " + str(self.calculate(tilasto[key][2]))
				print "MAKSIMI: " + str(self.calculate(tilasto[key][3]))
			print "================"

	# Muuttaa sekunteina annetun luvun muotoon hh:mm:ss
	def calculate(self, rivi):
		value = str(datetime.timedelta(seconds=rivi))
		return value

if __name__ == '__main__':
	parser = argparse.ArgumentParser(description="CSV dump processor")
	parser.add_argument("tiedosto", help="File to process.")
	parser.add_argument("-p", "--printout", help="Print dump contents in readable form.", action='store_true')
	parser.add_argument("-r", "--report", help="Print a statistical report of dump contents.", action='store_true')
	args = parser.parse_args()
	processor = Processor(args.tiedosto)
	if args.printout:
		processor.tulosta()
	if args.report:
		processor.tilastot()