#!/usr/bin/python

DB_NAME = "gisfuzzy"
DB_USER = "postgres"
DB_PASS = "postgres"

import psycopg2
import pandas as pd
import numpy as np

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

#perintah sql
cur.execute("SELECT (CAST(jml_balita_sehat AS FLOAT) / CAST(jml_balita AS FLOAT))*100 as persentase_pelayanan FROM pelayanan_kesehatan WHERE tahun_id=5 order by kabkota_id asc;")
dt_pelayanan = np.array(cur.fetchall())
arr_pelayanan = np.round( [float(i) for i in dt_pelayanan], 1)

cur.execute("SELECT (CAST(jml_akses_jamban AS FLOAT) / CAST(jml_kk AS FLOAT))*100 as persentase_sanitasi FROM sanitasi_jamban WHERE tahun_id=5 order by kabkota_id asc;")
dt_sanitasi = np.array(cur.fetchall())
arr_sanitasi = np.round( [float(i) for i in dt_sanitasi], 1)

cur.execute("SELECT (CAST(desa_uci.jml_desa_uci AS FLOAT) / CAST(kabupaten_kota.jml_desa AS FLOAT))*100 as persentase_desauci from desa_uci join kabupaten_kota on desa_uci.kabkota_id = kabupaten_kota.id_kab where desa_uci.tahun_id=5 order by desa_uci.kabkota_id asc;")
dt_desa = np.array(cur.fetchall())
arr_desa = np.round( [float(i) for i in dt_desa], 1)

cur.execute("SELECT (CAST(jml_diberi_asi AS FLOAT) / CAST(jml_bayi AS FLOAT))*100 as persentase_asi FROM asi_eksklusif WHERE tahun_id=5 order by kabkota_id asc;")
dt_asi = np.array(cur.fetchall())
arr_asi = np.round( [float(i) for i in dt_asi], 1)

cur.execute("SELECT CAST(persentase AS FLOAT) FROM stunting WHERE tahun_id=5 order by kabkota_id asc;")
dt_stunting = np.array(cur.fetchall())
arr_stunting = np.round( [float(i) for i in dt_stunting], 1)

exec(open("../python/inferensi_fuzzy.py").read())

datas = []

for i in range(len(arr_pelayanan)):
  tipping.input['pelayanan'] = arr_pelayanan[i]
  tipping.input['sanitasi'] = arr_sanitasi[i]
  tipping.input['desa'] = arr_desa[i]
  tipping.input['asi'] = arr_asi[i]
  tipping.input['stunting'] = arr_stunting[i]
  tipping.compute()
  deff = np.around(tipping.output['risiko'],4)
  datas.append(deff)

#hasil = pd.DataFrame({'defuzzification':datas})
hasil = pd.DataFrame({'pelayanan_kesehatan': arr_pelayanan,'sanitasi_jamban': arr_sanitasi,'desa_imunisasi': arr_desa,'asi_eksklusif':arr_asi,'stunting':arr_stunting,'defuzzification':datas})
# print(hasil)

for ind, row in hasil.iterrows():
  hasil.loc[hasil['defuzzification'] < 1.5, 'tingkat_risiko'] = 'Rendah' 
  hasil.loc[(hasil['defuzzification'] >= 1.5) & (hasil['defuzzification'] < 2.5) , 'tingkat_risiko'] = 'Sedang' 
  hasil.loc[hasil['defuzzification'] >= 2.5 , 'tingkat_risiko'] = 'Tinggi' 

cur.execute("SELECT  tb_tahun.id_tahun, kabupaten_kota.id_kab from tb_tahun, kabupaten_kota where tb_tahun.id_tahun = 5 order by kabupaten_kota.id_kab asc;")
datakab = cur.fetchall()
tahun_kab = pd.DataFrame(datakab, columns=["id_tahun","id_kab"])

#untuk id ditabel hasil
df_id = pd.DataFrame()
df_id['id'] = np.arange(152, 152 + len(datakab)) + 1

data_new = pd.concat([df_id,tahun_kab,hasil], axis=1)
#print(data_new)

data_sql=data_new.to_numpy()

def bulkInsert(records):
    try:
        sql_insert_query = """ INSERT INTO hasil_risiko_new (id_hasil, tahun_id, kabkota_id, pelayanan_kesehatan, sanitasi, desa_uci, asi, stunting, defuzzifikasi, tingkat_risiko) 
                           VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s) """

        # executemany() to insert multiple rows
        result = cur.executemany(sql_insert_query, records)
        conn.commit()
        print(cur.rowcount, "Record inserted successfully into hasil risiko new table")

    except (Exception, psycopg2.Error) as error:
        print("Failed inserting record into hasil risiko new table {}".format(error))

    finally:
        # closing database connection.
        if conn:
            cur.close()
            conn.close()
            print("PostgreSQL connection is closed")

bulkInsert(data_sql)