# FREDI

## Installation du projet :

### 1. La base de données :
- La base de données se trouve dans le fichier sql au chemin FREDI/sql/fredi.sql.

Elle dispose actuellement :
- D'adhérents inscrits ;
- D'adhérents "prêts" à être inscrit (dans le fichier CSV) ;
- Des clubs de sports ;
- Des ligues sportives ;
- De responsables legaux ;
- De notes de frais ;
- De lignes de frais ;
- De motifs pour les lignes de frais.

### 2. Jeux de données :
Les jeux de données sont également disponible au format SQL dans des fichiers uniques :
- Adhérents du fichier CSV : FREDI/sql/jeux_de_donnees/adherent_csv.sql ;
- Les clubs de sports : FREDI/sql/jeux_de_donnees/club.sql ; 
- Les ligues sportives : FREDI/sql/jeux_de_donnees/ligue.sql ;
- De motifs pour les lignes de frais : FREDI/sql/jeux_de_donnees/motif.sql .

### 3. CSV :
Les jeux de données sont également disponible au format CSV dans le dossier FREDI/sql/CSV/...

### 4. Test avec données :

Connexion d'un adhérent : 
- Login : paco.barbe@outlook.fr
- Mot de passe : 0000

Connexion d'un responsable légal : 
- Login : test1@outlook.fr
- Mot de passe : 0000

Connexion du Trésorier :
- Login : tresorier@fredi.fr
- Mot de passe : 0000


## 5. LE PROJET FREDI WEB
Le site FREDI consiste à saisir des bordereaux ( lignes de frais ) sur un site web une fois authentifié. 4 acteurs sont présents, l'adhérent, le responsable légal, le trésorier et le responsable du CRIB.

### 5.1. Rappel du contexte
La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL) Les associations sportives (les clubs) de la M2L peuvent profiter de dispositions fiscales apparues en 2008 pour faire bénéficier de remises d'impôts aux adhérents engageant des frais, en particulier dans le cadre de déplacements liés à des compétitions, des stages sportifs, des réunions... 

La mise en œuvre de ce projet doit permettre de faciliter l'établissement du document officiel permettant la remise d'impôts et l’informatisant. Cette informatisation doit être réalisée par le service CRIB (Centre de Ressources & d’Information des Bénévoles) du CROSL, dont vous faîtes parti. La responsabilité de la réalisation de ce projet vous a été confiée, à vous et à votre équipe.

### 5.2. Le dispositif fiscal
Le dispositif fiscal est le suivant :

Les adhérents des clubs engageant des frais peuvent « renoncer » au remboursement de ces frais, ce qui équivaut à un don à l’association. Ils peuvent alors faire valoir ce don lors de leur déclaration de revenus et bénéficier de remise d’impôts (au même titre qu’un don à une association caritative par exemple).

L’association doit délivrer un document officiel numéroté à ses adhérents en fin d’année civile (document CERFA n° 11580-02) où figure le montant total « rétrocédé » à l’association durant l’année. Pour l’adhérent, ce document CERFA sert de reçu et il pourra le joindre à sa déclaration de revenus. Du point de vue du trésorier des associations sportives ou des clubs.

Le trésorier de l’association demande à ce que les adhérents enregistrent leurs frais dans une note de frais récapitulative signée et transmise au club avant le 24 décembre de l’année civile. Après cette date, le trésorier établit les reçus CERFA en deux exemplaires :
- Un pour l’adhérent o Un autre pour l’archivage comptable.

Le montant total des sommes rétrocédées par les adhérents doit apparaître dans la comptabilité : 
- En Charges : n° 62 « déplacements »
- En Produits : n°75 « autres produits de gestion courante/autres/dons »

## 6. LA SOLUTION INFORMATIQUE SOUHAITEE
Le service CRIB du CROSL souhaite offrir aux adhérents des clubs affiliés aux différentes ligues un service Web d'établissement de ce document CERFA, après concertation avec le centre des impôts. Pour empêcher la circulation de documents papier (perdus, donnés à des tiers, etc.), le CRIB décide que les bordereaux de notes de frais des adhérents de clubs seront remplis en ligne, sur le site web de la M2L.

### 6.1. Concernant le Front-office
Les notes de frais peuvent être saisies sur le site public «FREDI» par les adhérents ou bien par leur représentant légal (en règle générale, leurs parents), pour les adhérents mineurs. C'est ceux-ci qui bénéficieront alors de la remise d'impôt. Par souci de simplification, on considèrera qu’un représentant légal ne peut être adhérent. 

L'adhérent d'un club ou son représentant légal souhaitant bénéficier du service devra :

Pour sa première connexion au site FREDI, il fournira une adresse e-mail et un mot de passe. Il recevra un e-mail de confirmation avec le mot de passe qu’il a choisi.
Chaque fois qu’il se connectera au site, il pourra se faire renvoyer ce mot de passe s’il l’a oublié. Il indique le club auquel il adhère et saisit son n° de licence et ses coordonnées (ou celui de l'adhérent ou des adhérents qu'il représente) s’ils sont absents de la base.

Le système FREDI permet de connaître pour chaque adhérent de club son n° de licence, sa ligue d'affiliation, ses noms, prénoms et date de naissance. Ses informations sont données par les ligues au CRIB à la fin du mois de novembre.

Dès l’ouverture du site début janvier, il pourra ouvrir un bordereau de note de frais et commencer à saisir les différentes lignes de frais de ce bordereau. Tout au long de l’année et jusqu’au 24 décembre, il pourra compléter son bordereau en y ajoutant des lignes. Il pourra également supprimer ou modifier des lignes.

Enfin, il imprime son bordereau, le signe, y joint toutes les pièces justificatives et le transmet à la trésorière de son club. Il a jusqu’au 15 janvier pour faire parvenir ces documents.

## 6.2. Concernant le Back-office
### 6.2.1. Opérations réalisées par les responsables du CRIB
Les opérations de Back-office du site public FREDI réalisées par les responsables du CRIB sont protégées pour éviter que les adhérents ne s'y connectent par erreur. Les opérations souhaitées sont les suivantes :

- Importation dans la BDD des informations sur les adhérents des clubs depuis un fichier au format CSV,
- Saisie/modification des motifs de frais,
- Modification du tarif kilométrique légal en vigueur,
- Affiliation d'un club.

### 6.2.2 Opérations réalisées par les trésoriers des clubs affiliés
Les opérations réalisées par les trésoriers des clubs affiliés permettent la clôture (fin) de l’année. Ils disposent pour cela d’une application, hébergée sur le site Intranet du CRIB, qui doit permettre de répondre aux contraintes suivantes.

Dès le 25 décembre, les trésoriers des clubs affiliés peuvent télécharger la BDD des notes de frais depuis le serveur du site public « FREDI » sur le serveur du site intranet du CRIB.
Ils reçoivent les bordereaux « papier » signés jusqu’au 15 janvier. Ils leur permettent de valider le contenu de chaque bordereau. 

Dès qu’ils reçoivent les documents de l’adhérent, ils ouvrent son bordereau et valident chacune des lignes de frais, en les corrigeant éventuellement.

Quand le bordereau est entièrement validé, ils le valident et ils éditent deux exemplaires du document CERFA n° 11580-02. Le premier exemplaire est envoyé à l’adhérent et le second est archivé avec les pièces justificatives dans la comptabilité du club.

En fin de traitement, ils disposent d’un écran où le montant total des sommes de l’ensemble des bordereaux validés apparaît (ils reporteront ce montant total en comptabilité). Ils peuvent imprimer une pièce justificative de ce montant.
