
def getAllSymbolListFromTSETMC():
    import os
    import pandas as pd
    try:
        marketWatchUrl="http://www.tsetmc.com/tsev2/data/MarketWatchInit.aspx?h=0&r=0"
        import requests
        response=requests.get(marketWatchUrl, headers={'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/80.0.3987.132 Safari/537.36'})
        
        import re
        pattern=";([\d{15}]+),([\w+\d+]{12}),((?!^\d+?).+?),((?!^\d+?).+?),"
        regularExp=re.compile(pattern)
        regularExpResult=regularExp.findall(response.content.decode('utf-8'))
        data="urlSymbolInput,ISIS,symbol,company\n"
        for row in regularExpResult:
            for col in row:
                data+=str(col)+','
            data=data[:-1]
            data+="\n"
        data=bytes(data,'utf-8')        
        import io
        inmemorydata = io.BytesIO(data)
        data = pd.read_csv(inmemorydata, quotechar=',', delimiter=",", encoding='utf-8')
        return data
    except Exception as err:
        print("Error:"+str(err))
  
def saveAllSymbolListFromTSETMCToDB():
    print(sqlite3.version)
    conn = sqlite3.connect(r"/var/www/html/wordpress/wp-content/plugins/TraderPlugin/boors.db")
    c = conn.cursor()
    CreateSymbolsTableQuery=\
        """CREATE TABLE IF NOT EXISTS Symbols(
        idTrade TEXT PRIMARY KEY, 
        idTSE  TEXT NOT NULL UNIQUE,
        company NOT NULL UNIQUE,
        symbol NOT NULL UNIQUE
        );"""
    c = conn.cursor()
    c.execute(CreateSymbolsTableQuery)
    conn.commit()
    datas=getAllSymbolListFromTSETMC()
    for data in datas.to_numpy():
        record={'idTrade':data[0], 'idTSE':data[1], 'company':data[2], 'symbol':data[3]}
        c.execute("""insert or replace INTO Symbols VALUES (:idTrade, :idTSE, :company, :symbol)""", record)
    conn.commit()
    conn.close()

def loadAllSymbolListFromTSETMCToDB():
    print(sqlite3.version)
    conn = sqlite3.connect(r"/var/www/html/wordpress/wp-content/plugins/TraderPlugin/boors.db")
    c = conn.cursor()
    c.execute("SELECT * FROM Symbols")
    data=c.fetchall()
    conn.close()
    return data