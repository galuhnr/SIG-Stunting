#!/usr/bin/python

DB_NAME = "gisfuzzy"
DB_USER = "postgres"
DB_PASS = "postgres"

from tkinter.tix import COLUMN
import psycopg2
import pandas as pd
import numpy as np

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

#DATA KABUPATEN KOTA
cur.execute("SELECT  id_kab, nama_kabkota from kabupaten_kota order by id_kab asc;")
datakab = cur.fetchall()
kab = pd.DataFrame(datakab, columns=["id_kab","nama_kabkota"])

#FAKTOR PELAYANAN KESEHATAN
cur.execute("SELECT kabkota_id, tahun_id, (CAST(jml_balita_sehat AS FLOAT) / CAST(jml_balita AS FLOAT))*100 as persentase FROM pelayanan_kesehatan order by tahun_id, kabkota_id asc;")
dt_pelayanan = np.array(cur.fetchall()).round(1)
pelayanan = pd.DataFrame(dt_pelayanan, columns=["kabkota_id", "tahun_id", "persentase"])

pelayanan_2017 = pelayanan.loc[:37,'persentase']

pelayanan_2018 = pelayanan.loc[38:75, 'persentase']
pelayanan_2018.reset_index(drop=True, inplace=True)

pelayanan_2019 = pelayanan.loc[76:113, 'persentase']
pelayanan_2019.reset_index(drop=True, inplace=True)

pelayanan_2020 = pelayanan.loc[114:151, 'persentase']
pelayanan_2020.reset_index(drop=True, inplace=True)

pelayanan_2021 = pelayanan.loc[152:, 'persentase']
pelayanan_2021.reset_index(drop=True, inplace=True)

df_pelayanan = pd.concat([kab, pelayanan_2017, pelayanan_2018, pelayanan_2019, pelayanan_2020, pelayanan_2021], axis=1)
df_pelayanan.columns = ['id_kab', 'nama_kabkota', 'tahun2017', 'tahun2018', 'tahun2019','tahun2020','tahun2021']

#MOVING AVERAGE
df_pelayanan.loc[:,"SMA_2020"] = np.round(((df_pelayanan.loc[:,'tahun2017'] + df_pelayanan.loc[:,'tahun2018'] + df_pelayanan.loc[:,'tahun2019'])/3),1)
df_pelayanan.loc[:,"SMA_2021"] = np.round(((df_pelayanan.loc[:,'tahun2018'] + df_pelayanan.loc[:,'tahun2019'] +df_pelayanan.loc[:,'tahun2020'])/3),1)
df_pelayanan.loc[:,"SMA_2022"] = np.round(((df_pelayanan.loc[:,'tahun2019'] + df_pelayanan.loc[:,'tahun2020'] +df_pelayanan.loc[:,'tahun2021'])/3),1)

#simpan di array untuk proses fuzzy
arr_pelayanan = df_pelayanan['SMA_2022'].to_numpy()

#FAKTOR SANITASI LAYAK ATAU JAMBAN SEHAT
cur.execute("SELECT kabkota_id, tahun_id, (CAST(jml_akses_jamban AS FLOAT) / CAST(jml_kk AS FLOAT))*100 as persentase_sanitasi FROM sanitasi_jamban order by tahun_id, kabkota_id asc;")
dt_sanitasi = np.array(cur.fetchall()).round(1)
sanitasi = pd.DataFrame(dt_sanitasi, columns=["kabkota_id", "tahun_id", "persentase_sanitasi"])

sanitasi_2017 = sanitasi.loc[:37,'persentase_sanitasi']

sanitasi_2018 = sanitasi.loc[38:75, 'persentase_sanitasi']
sanitasi_2018.reset_index(drop=True, inplace=True)

sanitasi_2019 = sanitasi.loc[76:113, 'persentase_sanitasi']
sanitasi_2019.reset_index(drop=True, inplace=True)

sanitasi_2020 = sanitasi.loc[114:151, 'persentase_sanitasi']
sanitasi_2020.reset_index(drop=True, inplace=True)

sanitasi_2021 = sanitasi.loc[152:, 'persentase_sanitasi']
sanitasi_2021.reset_index(drop=True, inplace=True)

df_sanitasi = pd.concat([kab, sanitasi_2017, sanitasi_2018, sanitasi_2019, sanitasi_2020, sanitasi_2021], axis=1)
df_sanitasi.columns = ['id_kab', 'nama_kabkota', 'tahun2017', 'tahun2018', 'tahun2019','tahun2020','tahun2021']

#MOVING AVERAGE
df_sanitasi.loc[:,"SMA_2020"] = np.round(((df_sanitasi.loc[:,'tahun2017'] + df_sanitasi.loc[:,'tahun2018'] +df_sanitasi.loc[:,'tahun2019'])/3),1)
df_sanitasi.loc[:,"SMA_2021"] = np.round(((df_sanitasi.loc[:,'tahun2018'] + df_sanitasi.loc[:,'tahun2019'] +df_sanitasi.loc[:,'tahun2020'])/3),1)
df_sanitasi.loc[:,"SMA_2022"] = np.round(((df_sanitasi.loc[:,'tahun2019'] + df_sanitasi.loc[:,'tahun2020'] +df_sanitasi.loc[:,'tahun2021'])/3),1)

#simpan di array untuk proses fuzzy
arr_sanitasi = df_sanitasi['SMA_2022'].to_numpy()

#FAKTOR DESA UCI
cur.execute("SELECT desa_uci.kabkota_id, desa_uci.tahun_id, (CAST(desa_uci.jml_desa_uci AS FLOAT) / CAST(kabupaten_kota.jml_desa AS FLOAT))*100 as persentase FROM desa_uci join kabupaten_kota on desa_uci.kabkota_id = kabupaten_kota.id_kab order by desa_uci.tahun_id, desa_uci.kabkota_id asc;")
dt_desauci = np.array(cur.fetchall()).round(1)
desauci = pd.DataFrame(dt_desauci, columns=["kabkota_id", "tahun_id", "persentase"])

desauci_2017 = desauci.loc[:37,'persentase']

desauci_2018 = desauci.loc[38:75, 'persentase']
desauci_2018.reset_index(drop=True, inplace=True)

desauci_2019 = desauci.loc[76:113, 'persentase']
desauci_2019.reset_index(drop=True, inplace=True)

desauci_2020 = desauci.loc[114:151, 'persentase']
desauci_2020.reset_index(drop=True, inplace=True)

desauci_2021 = desauci.loc[152:, 'persentase']
desauci_2021.reset_index(drop=True, inplace=True)

df_desauci = pd.concat([kab, desauci_2017, desauci_2018, desauci_2019, desauci_2020, desauci_2021], axis=1)
df_desauci.columns = ['id_kab', 'nama_kabkota', 'tahun2017', 'tahun2018', 'tahun2019','tahun2020','tahun2021']

#MOVING AVERAGE
df_desauci.loc[:,"SMA_2020"] = np.round(((df_desauci.loc[:,'tahun2017'] + df_desauci.loc[:,'tahun2018'] +df_desauci.loc[:,'tahun2019'])/3),1)
df_desauci.loc[:,"SMA_2021"] = np.round(((df_desauci.loc[:,'tahun2018'] + df_desauci.loc[:,'tahun2019'] +df_desauci.loc[:,'tahun2020'])/3),1)
df_desauci.loc[:,"SMA_2022"] = np.round(((df_desauci.loc[:,'tahun2019'] + df_desauci.loc[:,'tahun2020'] +df_desauci.loc[:,'tahun2021'])/3),1)

arr_desa = df_desauci['SMA_2022'].to_numpy()

#FAKTOR ASI EKSKLUSIF
cur.execute("SELECT kabkota_id, tahun_id, (CAST(jml_diberi_asi AS FLOAT) / CAST(jml_bayi AS FLOAT))*100 as persentase FROM asi_eksklusif order by tahun_id, kabkota_id asc;")
dt_asi = np.array(cur.fetchall()).round(1)
asi = pd.DataFrame(dt_asi, columns=["kabkota_id", "tahun_id", "persentase"])

asi_2017 = asi.loc[:37,'persentase']

asi_2018 = asi.loc[38:75, 'persentase']
asi_2018.reset_index(drop=True, inplace=True)

asi_2019 = asi.loc[76:113, 'persentase']
asi_2019.reset_index(drop=True, inplace=True)

asi_2020 = asi.loc[114:151, 'persentase']
asi_2020.reset_index(drop=True, inplace=True)

asi_2021 = asi.loc[152:, 'persentase']
asi_2021.reset_index(drop=True, inplace=True)

df_asi = pd.concat([kab, asi_2017, asi_2018, asi_2019, asi_2020, asi_2021], axis=1)
df_asi.columns = ['id_kab', 'nama_kabkota', 'tahun2017', 'tahun2018', 'tahun2019','tahun2020','tahun2021']

#MOVING AVERAGE
df_asi.loc[:,"SMA_2020"] = np.round(((df_asi.loc[:,'tahun2017'] + df_asi.loc[:,'tahun2018'] + df_asi.loc[:,'tahun2019'])/3),1)
df_asi.loc[:,"SMA_2021"] = np.round(((df_asi.loc[:,'tahun2018'] + df_asi.loc[:,'tahun2019'] +df_asi.loc[:,'tahun2020'])/3),1)
df_asi.loc[:,"SMA_2022"] = np.round(((df_asi.loc[:,'tahun2019'] + df_asi.loc[:,'tahun2020'] +df_asi.loc[:,'tahun2021'])/3),1)

#simpan di array untuk proses fuzzy
arr_asi = df_asi['SMA_2022'].to_numpy()

#FAKTOR STUNTING
cur.execute("SELECT kabkota_id, tahun_id, CAST(persentase AS FLOAT) FROM stunting order by tahun_id, kabkota_id asc;")
dt_stunting = np.array(cur.fetchall()).round(1)
stunting = pd.DataFrame(dt_stunting, columns=["kabkota_id", "tahun_id", "persentase"])

stunting_2017 = stunting.loc[:37,'persentase']

stunting_2018 = stunting.loc[38:75, 'persentase']
stunting_2018.reset_index(drop=True, inplace=True)

stunting_2019 = stunting.loc[76:113, 'persentase']
stunting_2019.reset_index(drop=True, inplace=True)

stunting_2020 = stunting.loc[114:151, 'persentase']
stunting_2020.reset_index(drop=True, inplace=True)

stunting_2021 = stunting.loc[152:, 'persentase']
stunting_2021.reset_index(drop=True, inplace=True)

df_stunting = pd.concat([kab, stunting_2017, stunting_2018, stunting_2019, stunting_2020, stunting_2021], axis=1)
df_stunting.columns = ['id_kab', 'nama_kabkota', 'tahun2017', 'tahun2018', 'tahun2019','tahun2020','tahun2021']

#MOVING AVERAGE
df_stunting.loc[:,"SMA_2020"] = np.round(((df_stunting.loc[:,'tahun2017'] + df_stunting.loc[:,'tahun2018'] + df_stunting.loc[:,'tahun2019'])/3),1)
df_stunting.loc[:,"SMA_2021"] = np.round(((df_stunting.loc[:,'tahun2018'] + df_stunting.loc[:,'tahun2019'] +df_stunting.loc[:,'tahun2020'])/3),1)
df_stunting.loc[:,"SMA_2022"] = np.round(((df_stunting.loc[:,'tahun2019'] + df_stunting.loc[:,'tahun2020'] +df_stunting.loc[:,'tahun2021'])/3),1)

#simpan di array untuk proses fuzzy
arr_stunting = df_stunting['SMA_2022'].to_numpy()

