GoogleScholar API
-----------------
version 1.5

Simple API that parses information from https://scholar.google.se/citations. 

Outputs the publications on the first page together with the Citation indeces. Live sample can be found here: http://cse.bth.se/~fer/googlescholar.php?user=vJjq9LwAAAAJ do note that the `user=<google-scholar-id>` must be set. Do note that there is no verification of the input variable `user`, this makes it possible to append `%26view_op=list_works%26sortby=pubdate` after the `scholar-id` to get the publications sorted by year (newest first).

Sample output:

```json
{
 "total_citations": 58,
 "citations_per_year": {
  "2012 ": 1 ,
  "2013 ": 7 ,
  "2014 ": 13 ,
  "2015 ": 10 ,
  "2016 ": 23 ,
  "2017 ": 2 
 },
 "publications": [
  {
    "title": "Privacy threats related to user profiling in online social networks",
    "authors": "F Erlandsson, M Boldt, H Johnson",
    "venue": "Privacy, Security, Risk and Trust (PASSAT), 2012 International Conference on ..., 2012 ",
    "citations": 18,
    "year": 2012 
  },
  {
    "title": "SIN: A Platform to Make Interactions in Social Networks Accessible",
    "authors": "SFW Roozbeh Nia, Fredrik Erlandsson, Prantik",
    "venue": "ASE International Conference on Social Informatics, 2012 ",
    "citations": 10,
    "year": 2012
  }
 ]
}
```

The following is an edition made for academic purposes. The original authorship of the API was carried out by MIT and its collaborators. This API should not be used for profit and is complementary to the work of degree: "Servicio de búsqueda sobre Google Académico para el R.B. Repository en Drupal 8.". Remember that you should not abuse the service since your IP address may be blocked due to improper use of Google services. For more information go to https://policies.google.com/terms
Lara Rengifo Juan David
Quirá Ordoñez Andrea


Search User on Google Scholar
Use: getuser.php
Data input: fname=firts name, sname=second name , flast=firts lastname,  slast=second lastname.
Example:
http://localhost/apiGS/getuser.php?fname=gustavo&sname=adolfo&flast=ramirez&slast=gonzales
Sample output:

```json
{
 "Autors": [
  {
    "Name": "Gustavo  M. Ramírez  Santana",
    "institution": "Universidad de La Laguna",
    "user": "9WCF7nsAAAAJ"
  },
  {
    "Name": "Gustavo Ramirez  valverde",
    "institution": "Profesor of the statistical department, Colegio de Postgraduados",
    "user": "a-szOIcAAAAJ"
  },
  {
    "Name": "Gustavo Ramirez -Gonzalez",
    "institution": "Profesor Universidad del Cauca (unicauca), Ex-becario Grupo Gradient Universidad Carlos &#8230;",
    "user": "Z9vU8awAAAAJ"
  },
  {
    "Name": "Gustavo  Adolfo Ramirez  Cordoba",
    "institution": "Docente de Ingeniería Agroforestal, Universidad Nacional Abierta ya Distancia UNAD",
    "user": "jvGkzd4AAAAJ"
  },
  {
    "Name": "Gustavo  A. Ramírez ",
    "institution": "University of Rhode Island",
    "user": "Bqia-SIAAAAJ"
  },
  {
    "Name": "Dr. JOSE GUSTAVO RAMIREZ -PAREDES",
    "institution": "Institute of Aquaculture, University of Stirling",
    "user": "zn3vzEAAAAAJ"
  },
  {
    "Name": "Gustavo  A. Ramirez  Castilla",
    "institution": "Instituto Nacional de Antropología e Historia",
    "user": "rLQw6dwAAAAJ"
  },
  {
    "Name": "Matías Maggio-Ramírez ",
    "institution": "Escuela de Arte N° 1 &quot;Gustavo  Chertudi&quot; / Universidad Nacional de Tres de Febrero",
    "user": "rzl4nS8AAAAJ"
  },
  {
    "Name": "DR. GUSTAVO  GARCIA RAMIREZ ",
    "institution": "Profesor de tiempo libre. Universidad Autónoma de Querétaro",
    "user": "IV9fWdIAAAAJ"
  },
  {
    "Name": "Gustavo  Alonso Ramos Ramirez ",
    "institution": "Investigador, Universidad Pedagógica de El Salvador Dr. Luis Alonso Aparicio",
    "user": "9VEMI60AAAAJ"
  },
  {
    "name": "Gustavo  M. Ramírez  Santana",
    "institution": "Universidad de La Laguna",
    "user": "9WCF7nsAAAAJ"
  },
  {
    "name": "Gustavo Ramirez  valverde",
    "institution": "Profesor of the statistical department, Colegio de Postgraduados",
    "user": "a-szOIcAAAAJ"
  },
  {
    "name": "Gustavo Ramirez -Gonzalez",
    "institution": "Profesor Universidad del Cauca (unicauca), Ex-becario Grupo Gradient Universidad Carlos &#8230;",
    "user": "Z9vU8awAAAAJ"
  },
  {
    "name": "Gustavo  Adolfo Ramirez  Cordoba",
    "institution": "Docente de Ingeniería Agroforestal, Universidad Nacional Abierta ya Distancia UNAD",
    "user": "jvGkzd4AAAAJ"
  },
  {
    "name": "Gustavo  A. Ramírez ",
    "institution": "University of Rhode Island",
    "user": "Bqia-SIAAAAJ"
  },
  {
    "name": "Dr. JOSE GUSTAVO RAMIREZ -PAREDES",
    "institution": "Institute of Aquaculture, University of Stirling",
    "user": "zn3vzEAAAAAJ"
  },
  {
    "name": "Gustavo  A. Ramirez  Castilla",
    "institution": "Instituto Nacional de Antropología e Historia",
    "user": "rLQw6dwAAAAJ"
  },
  {
    "name": "Matías Maggio-Ramírez ",
    "institution": "Escuela de Arte N° 1 &quot;Gustavo  Chertudi&quot; / Universidad Nacional de Tres de Febrero",
    "user": "rzl4nS8AAAAJ"
  },
  {
    "name": "DR. GUSTAVO  GARCIA RAMIREZ ",
    "institution": "Profesor de tiempo libre. Universidad Autónoma de Querétaro",
    "user": "IV9fWdIAAAAJ"
  },
  {
    "name": "Gustavo  M. Ramírez  Santana",
    "institution": "Universidad de La Laguna",
    "user": "9WCF7nsAAAAJ"
  },
  {
    "name": "Gustavo  M. Ramírez  Santana",
    "institution": "Universidad de La Laguna",
    "user": "9WCF7nsAAAAJ"
  },
  {
    "name": "Gustavo Ramirez  valverde",
    "institution": "Profesor of the statistical department, Colegio de Postgraduados",
    "user": "a-szOIcAAAAJ"
  },
  {
    "name": "Gustavo Ramirez  valverde",
    "institution": "Profesor of the statistical department, Colegio de Postgraduados",
    "user": "a-szOIcAAAAJ"
  },
  {
    "name": "Gustavo Ramirez -Gonzalez",
    "institution": "Profesor Universidad del Cauca (unicauca), Ex-becario Grupo Gradient Universidad Carlos &#8230;",
    "user": "Z9vU8awAAAAJ"
  },
  {
    "name": "Gustavo Ramirez -Gonzalez",
    "institution": "Profesor Universidad del Cauca (unicauca), Ex-becario Grupo Gradient Universidad Carlos &#8230;",
    "user": "Z9vU8awAAAAJ"
  },
  {
    "name": "Gustavo  Adolfo Ramirez  Cordoba",
    "institution": "Docente de Ingeniería Agroforestal, Universidad Nacional Abierta ya Distancia UNAD",
    "user": "jvGkzd4AAAAJ"
  },
  {
    "name": "Gustavo  Adolfo Ramirez  Cordoba",
    "institution": "Docente de Ingeniería Agroforestal, Universidad Nacional Abierta ya Distancia UNAD",
    "user": "jvGkzd4AAAAJ"
  },
  {
    "name": "Gustavo  A. Ramírez ",
    "institution": "University of Rhode Island",
    "user": "Bqia-SIAAAAJ"
  },
  {
    "name": "Gustavo  A. Ramírez ",
    "institution": "University of Rhode Island",
    "user": "Bqia-SIAAAAJ"
  },
  {
    "name": "Dr. JOSE GUSTAVO RAMIREZ -PAREDES",
    "institution": "Institute of Aquaculture, University of Stirling",
    "user": "zn3vzEAAAAAJ"
  },
  {
    "name": "Dr. JOSE GUSTAVO RAMIREZ -PAREDES",
    "institution": "Institute of Aquaculture, University of Stirling",
    "user": "zn3vzEAAAAAJ"
  },
  {
    "name": "Gustavo  A. Ramirez  Castilla",
    "institution": "Instituto Nacional de Antropología e Historia",
    "user": "rLQw6dwAAAAJ"
  },
  {
    "name": "Gustavo  A. Ramirez  Castilla",
    "institution": "Instituto Nacional de Antropología e Historia",
    "user": "rLQw6dwAAAAJ"
  },
  {
    "name": "Matías Maggio-Ramírez ",
    "institution": "Escuela de Arte N° 1 &quot;Gustavo  Chertudi&quot; / Universidad Nacional de Tres de Febrero",
    "user": "rzl4nS8AAAAJ"
  },
  {
    "name": "Matías Maggio-Ramírez ",
    "institution": "Escuela de Arte N° 1 &quot;Gustavo  Chertudi&quot; / Universidad Nacional de Tres de Febrero",
    "user": "rzl4nS8AAAAJ"
  },
  {
    "name": "DR. GUSTAVO  GARCIA RAMIREZ ",
    "institution": "Profesor de tiempo libre. Universidad Autónoma de Querétaro",
    "user": "IV9fWdIAAAAJ"
  },
  {
    "name": "Gustavo  Alonso Ramos Ramirez ",
    "institution": "Investigador, Universidad Pedagógica de El Salvador Dr. Luis Alonso Aparicio",
    "user": "9VEMI60AAAAJ"
  }
] 
}
```
Search all publication of user on Google Scholar
Use: getallpublication.php
Data input: user="56ReWfsAAAAJ"."100"
Each user has 12 characters, + 3 that indicate how many publications will be loaded in the API.  
Allowed values: 100
                200
                300
                400
                500
Example:
http://localhost/apiGS/getallpublication.php?user=56ReWfsAAAAJ100
Sample output:
```json
{
 "total_citations": 0,
 "indice h": 0,
 "citations_per_year": 
 },
 "publications": [
  {
    "title": "Bases for the construction of a QoS model for a video-calls service in a virtualized IMS network",
    "authors": "MC Lara Paz, HA Coral Sarria, E Rojas Pineda",
    "venue": "Sistemas &amp; Telemática 15 (42), 2017 ",
    "citations": ,
    "year": 2017 ",
    "idpub": "WF5omc3nYNoC",
  },
  {
    "title": "RB Repository: Reference bibliographies repository for Drupal 7",
    "authors": "FO Collazos, BEH Hurtado, ER Pineda",
    "venue": "Sistemas &amp; Telemática 14 (38), 47-62, 2016 ",
    "citations": ,
    "year": 2016 ",
    "idpub": "YsMSGLbcyi4C",
  },
  {
    "title": "Soluciones organizacionales a partir de ontologías",
    "authors": "EG Pemberty, ER Pineda",
    "venue": "Avances en Sistemas e Informática 8 (1), 101-112, 2011 ",
    "citations": ,
    "year": 2011 ",
    "idpub": "9yKSN-GCB0IC",
  },
  {
    "title": "AGENDA CAUCANA DE CIENCIA, TECNOLOGÍA E INNOVACIÓN “CAUCACYT”",
    "authors": "DJ Sanchez Preciado, LS Pemberthy Gallo, E Rojas Pineda, ...",
    "venue": "Universidad del Cauca, ISBN: 9589475779, 2005 ",
    "citations": ,
    "year": 2005 ",
    "idpub": "zYLM7Y9cAGgC",
  },
  {
    "title": "VI Simposio de Investigaciones Facultad de Salud 27 al 29 de Octubre de 2004. El Sistema de Investigaciones de la Universidad del Cauca y su articulación con los...",
    "authors": "ER Pineda",
    "venue": "VI Simposio de Investigaciones Facultad de Salud 27 al 29 de Octubre de 2004, 2004 ",
    "citations": ,
    "year": 2004 ",
    "idpub": "UeHWp8X0CEIC",
  },
  {
    "title": "Comunidades y Cultura del Conocimiento: La experiencia del Sistema de Investigaciones de la Universidad del Cauca, Colombia.",
    "authors": "E Rojas Pineda, AJ Castrillón Muñoz, CA León Roa",
    "venue": "Gestión Del Conocimiento: Pautas y Lineamientos Generales. ISBN: 958-33-4823 &#8230;, 2003 ",
    "citations": ,
    "year": 2003 ",
    "idpub": "Tyk-4Ss8FVUC",
  },
  {
    "title": "Concepto, Proceso y Gestión de Líneas de Investigación",
    "authors": "E Rojas Pineda",
    "venue": "Unicauca  Ciencia, ISSN: 0122-6037 6 (1), 19-23, 2001 ",
    "citations": ,
    "year": 2001 ",
    "idpub": "W7OEmFMy1HYC",
  },
  {
    "title": "EL MRDP COMO ESTRATEGIA BÁSICA PARA LA COMPETITIVIDAD",
    "authors": "ER Pineda, CES Castaño",
    "venue": "X Congreso Nacional y I Andino de Telecomunicaciones 1 (1), 1995 ",
    "citations": ,
    "year": 1995 ",
    "idpub": "u-x6o8ySG0sC",
  },
  {
    "title": "Hacia un nuevo modelo de formación en ingeniería electrónica y telecomunicaciones en la Universidad del Cauca",
    "authors": "ER Pineda",
    "venue": "Uniandes, 1993 ",
    "citations": ,
    "year": 1993 ",
    "idpub": "2osOgNQ5qMEC",
  }
 ]
}
```
Search data of a publication on Google Scholar
Use: getpublication.php
Data input: puser="56ReWfsAAAAJ"."YsMSGLbcyi4C"
Each user has 12 characters, + Each publication has 12 characters.  
Example:
http://localhost/apiGS/getpublication.php?puser=56ReWfsAAAAJYsMSGLbcyi4C
Sample output:
```json
 "Publication":
  {
    "title": "RB Repository: Reference bibliographies repository for Drupal 7",
    "authors": "Fabi�n Ortiz Collazos, Beatriz Elena Hurtado Hurtado, Eduardo Rojas Pineda",
    "Publication date": "2016/10/6",
    "Conference": " ",
    "Journal": "Sistemas &amp; Telem�tica",
    "Book": " ",
    "Volume": "14",
    "Issue": "38",
    "Pages": "47-62",
    "Publisher": " ",
    "abstract": "This article, a result of a research project, the characteristics and functions of a module 
developed for managing bibliographic references about the content management system 
Drupal Version 7 are exposed. It integrates several functions that allows to host the 
information in a repository, of both bibliographic and users, and includes a function based 
on the Scopus API to obtain in a semiautomatically way metadata from publications, which 
simplifies and streamlines the information introduction and extraction. Acquiring metadata 
from publications would have a semiautomatic component which would reduce the amount 
of information that should be entered manually.",
    "Institution": " ",
    "Number": " ",
 "URL": "http://200.3.192.46/revistas/index.php/sistemas_telematica/article/download/2288/2937",
  }
}.
```
