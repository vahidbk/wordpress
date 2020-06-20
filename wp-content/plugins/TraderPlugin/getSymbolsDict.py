#!/usr/bin/env python
import json
# print json.dumps({'a':'b','c':'d','e':'f'});

TSETMCPath="/home/me/Programming/TehranStockPriceAnalyser/TSETMC.py"

try:
    import importlib.util
    spec = importlib.util.spec_from_file_location("TSETMC", TSETMCPath)
    TSETMC = importlib.util.module_from_spec(spec)
    spec.loader.exec_module(TSETMC)
except Exception as err:
    print("Error:"+str(err))

try:
    TSETMC.saveAllSymbolListFromTSETMCToDB()   
    symbolList=TSETMC.loadAllSymbolListFromTSETMCToDB()
    symbolsDict={}
    for symbolData in symbolList:
        symbolIDTSE=symbolData[0]
        symbolIDTrader=symbolData[1]
        symbolCompany=symbolData[2]
        symbol=symbolData[3]
        name = symbol+" ,"+symbolCompany
        data={"IDTSE":symbolIDTSE, "IDTrader":symbolIDTrader, "symbolCompany":symbolCompany, "ShortName":symbol}
        data=symbolIDTrader
        symbolsDict[data] = name
    print (json.dumps(symbolsDict))
except Exception as err:
    print("Error:"+str(err))
