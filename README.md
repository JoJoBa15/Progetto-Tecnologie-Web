# 🎫 Gestionale Ticket - HelpDesk iFantastici4

Applicazione web sviluppata in **PHP** e **PostgreSQL** per la gestione di ticket di assistenza tecnica.

Il progetto simula una piattaforma HelpDesk in cui gli utenti possono aprire segnalazioni, allegare file, seguire lo stato dei propri ticket e comunicare con lo staff tramite una chat interna. Gli amministratori possono invece monitorare l’intero sistema, gestire gli utenti, cambiare lo stato dei ticket e consultare statistiche operative.

---

## 📌 Obiettivo del progetto

L’obiettivo del sistema è fornire una piattaforma semplice e funzionale per la gestione delle richieste di supporto.

Il progetto è stato realizzato a scopo universitario/didattico e mette in pratica concetti legati a:

* sviluppo web server-side con PHP;
* gestione delle sessioni utente;
* autenticazione e registrazione;
* interazione con database PostgreSQL;
* gestione dei ruoli utente/admin;
* upload e salvataggio di allegati;
* dashboard statistiche;
* progettazione di interfacce responsive.

---

## 🧩 Funzionalità principali

### 👤 Autenticazione utenti

* Registrazione di nuovi utenti.
* Login tramite email e password.
* Password salvate tramite hashing.
* Gestione della sessione utente.
* Separazione tra ruolo `user` e ruolo `admin`.

### 🧑‍💻 Area utente

Gli utenti possono:

* aprire un nuovo ticket;
* indicare categoria e priorità della segnalazione;
* aggiungere una descrizione dettagliata;
* caricare allegati;
* visualizzare i propri ticket;
* consultare i ticket condivisi nella community;
* seguire lo stato delle proprie richieste;
* scrivere messaggi nella chat del ticket.

### 🛠️ Area amministratore

Gli amministratori possono:

* visualizzare tutti i ticket aperti;
* consultare i ticket chiusi;
* modificare lo stato dei ticket;
* visualizzare gli utenti registrati;
* distinguere clienti e staff amministrativo;
* modificare alcune informazioni dei profili;
* monitorare statistiche e andamento dei ticket.

### 💬 Chat interna del ticket

Ogni ticket dispone di una sezione conversazione, utile per mantenere lo storico della comunicazione tra utente e staff.

La chat permette di:

* aggiungere nuovi messaggi;
* distinguere messaggi dell’utente, dello staff e del profilo corrente;
* mantenere lo storico della discussione;
* impedire nuove interazioni sui ticket chiusi.

### 📎 Gestione allegati

Il sistema consente il caricamento di allegati durante la creazione del ticket.

Caratteristiche principali:

* supporto a immagini e PDF;
* validazione dell’estensione del file;
* controllo della dimensione massima;
* salvataggio degli allegati direttamente nel database;
* recupero e visualizzazione/download degli allegati associati al ticket.

### 📊 Dashboard

La dashboard mostra una panoramica generale dello stato del sistema.

Sono presenti:

* andamento dei ticket negli ultimi 7 giorni;
* percentuali di ticket attivi, risolti e chiusi;
* lista degli ultimi aggiornamenti;
* statistiche differenziate in base al ruolo dell’utente.

---

## 🛠️ Tecnologie utilizzate

* **PHP**
* **PostgreSQL**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Font Awesome**
* **Google Fonts**
* **SQL**

---

## 🗃️ Database

Il progetto utilizza un database PostgreSQL.

Lo script `db_creation.sql` crea e popola le principali tabelle del sistema:

* `users`
* `tickets`
* `messages`
* `ticket_attachments`
* `faqs`

Il database include anche dati di esempio utili per testare rapidamente l’applicazione, tra cui utenti demo, ticket, FAQ e conversazioni.

---

## 🗂️ Struttura del progetto

```text id="txqud5"
Gestionale-Ticket/
│
├── index.php
├── auth.php
├── logout.php
├── db.php
├── db_creation.sql
├── style.css
│
├── pages/
│   ├── landing.php
│   ├── dashboard.php
│   ├── new_ticket.php
│   ├── tickets_list.php
│   ├── ticket_details.php
│   ├── users_admin.php
│   └── chi_siamo.php
│
├── icon/
│   └── risorse grafiche del progetto
│
└── img/
    └── immagini utilizzate nell'interfaccia
```

---

## 🧠 Architettura generale

Il progetto è organizzato con un file principale, `index.php`, che gestisce il routing interno dell’applicazione.

Le varie schermate sono suddivise nella cartella `pages/`, mentre la connessione al database è centralizzata nel file `db.php`.

La logica principale è organizzata intorno a:

* gestione delle sessioni;
* routing tramite parametro `page`;
* controllo del ruolo utente;
* query PostgreSQL tramite funzioni `pg_*`;
* pagine dedicate per dashboard, ticket, utenti e dettagli;
* componenti grafici realizzati con HTML, CSS e JavaScript.

---

## ⚙️ Requisiti

Per eseguire il progetto sono necessari:

* PHP 8.x
* PostgreSQL
* Server locale come Apache, XAMPP, Laragon o ambiente equivalente
* Estensione PHP per PostgreSQL abilitata

---

## ▶️ Installazione e avvio

Clonare il repository:

```bash id="mpqxgr"
git clone https://github.com/JoJoBa15/Gestionale-Ticket.git
```

Entrare nella cartella del progetto:

```bash id="67j8ha"
cd Gestionale-Ticket
```

Creare il database PostgreSQL:

```bash id="30gy4i"
createdb gruppo_ifantastici4
```

Importare lo script SQL:

```bash id="w75u7f"
psql -U www -d gruppo_ifantastici4 -f db_creation.sql
```

Configurare la connessione al database nel file `db.php`:

```php id="4upbqu"
$host = '127.0.0.1';
$port = '5432';
$db   = 'gruppo_ifantastici4';
$user = 'www';
$pass = 'www';
```

Avviare il progetto tramite server locale e aprire nel browser:

```text id="6k0egt"
http://localhost/Gestionale-Ticket/
```

---

## 👥 Ruoli disponibili

### User

L’utente standard può aprire ticket, visualizzare le proprie segnalazioni, consultare la community e interagire nella chat dei ticket.

### Admin

L’amministratore può visualizzare tutti i ticket, gestire gli stati, consultare gli utenti registrati e monitorare l’andamento generale della piattaforma.

---

## 🧪 Dati di esempio

Lo script `db_creation.sql` popola il sistema con dati dimostrativi:

* utenti di test;
* ticket con categorie diverse;
* priorità differenti;
* stati `open`, `resolved` e `closed`;
* conversazioni di esempio;
* FAQ.

Questo permette di provare immediatamente le funzionalità principali senza dover inserire manualmente tutti i dati.

---

## 📌 Stati dei ticket

Il sistema gestisce tre stati principali:

| Stato      | Significato                       |
| ---------- | --------------------------------- |
| `open`     | Ticket aperto e ancora da gestire |
| `resolved` | Problema risolto                  |
| `closed`   | Ticket chiuso e archiviato        |

---

## 🚦 Priorità dei ticket

Ogni ticket può avere una priorità:

| Priorità | Significato        |
| -------- | ------------------ |
| `low`    | Bassa urgenza      |
| `medium` | Urgenza media      |
| `high`   | Alta priorità      |
| `urgent` | Intervento urgente |

---

## 📎 Categorie disponibili

Le segnalazioni possono essere classificate in diverse categorie:

* Software
* Hardware
* Rete
* Account

---

## 🔐 Note sulla sicurezza

Il progetto include alcune misure di sicurezza di base:

* utilizzo delle sessioni PHP;
* controllo dell’accesso alle pagine interne;
* distinzione tra utenti e amministratori;
* hashing delle password;
* validazione di estensioni e dimensioni degli allegati;
* protezione dall’accesso diretto ad alcune pagine interne.

Essendo un progetto didattico, alcune parti possono essere ulteriormente migliorate, ad esempio introducendo prepared statements, gestione più avanzata degli errori, CSRF token e validazioni più robuste lato server.

---

## 👥 Team

Progetto realizzato dal gruppo **iFantastici4**.


## 📚 Contesto didattico

Il progetto è stato sviluppato come applicazione web gestionale per simulare un sistema HelpDesk completo.

L’elaborato mette insieme:

* progettazione del database;
* sviluppo backend;
* sviluppo frontend;
* gestione dei ruoli;
* interazione utente-amministratore;
* gestione di file e allegati;
* dashboard e statistiche;
* organizzazione modulare delle pagine.

---

## 📄 Licenza

Progetto realizzato a scopo didattico universitario.
