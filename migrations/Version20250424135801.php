<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424135801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO public.category (name,description) VALUES
	 ('Abstract Strategy','Abstract Strategy games are often (but not always):

theme-less
without a storyline
built on simple and/or straightforward design and mechanics
perfect information games
games that promote one player overtaking their opponent(s)
little to no elements of luck, chance, or random occurrence'),
	 ('Action / Dexterity','Action/Dexterity games often compete players'' physical reflexes and co-ordination as a determinant of overall success.

Typical games are: Rhino Hero, Jenga, Crokinole'),
	 ('Adventure','Adventure games often have themes of heroism, exploration, and puzzle-solving. The storyline behind such games often have fantastical elements, and involve the characters in some sort of quest.'),
	 ('Age of Reason','Age of Reason games are board-wargames and historical games (expansion, promos, etc.) set from late 17th century (around 1690) to late 18th century (1789).

The Age of Reason started around 1690, with the development and adoption of the socket bayonet by the main European armies, coming to an end in 1789 with the French Revolutionary Wars and the following Napoleonic Wars.'),
	 ('American Civil War','American Civil War games have storylines set during the secession years of the United States of America, 1861-1865.

The most popular American Civil War games are also categorized as Wargames.

'),
	 ('American Indian Wars','American Indian Wars games generally have themes concerning the battles and wars between the indigenous peoples of North America and the colonizing European powers or settlers during the XVII (17)th and XVIII (18)th centuries. It also covers battles and wars between those indigenous peoples and the United States government during the XVIII (18)th and XIX (19)th centuries.

Most American Indian Wars games are also categorized as Wargames.'),
	 ('American Revolutionary War','American Revolutionary War games have storylines set during the American War of Independence, 1775-1783.

Most American Revolutionary War games are also categorized as Wargames.'),
	 ('American West','American West games often have themes or storylines set in the Western United States during the latter half of the 19th century. Some of the themes and imagery found in the most popular American West games concerns cowboys, sheriffs, outlaws, prospecting, colonization, and railways, among others.

'),
	 ('Ancient','Ancient games often have themes or storylines set in the Old World, between 3000 BC (the beginning of the Egyptian dynasties) and AD 476 (the fall of the Western Roman Empire). Some of the themes and imagery found in the most popular Ancient games concerns ancient Egyptian, Greek, and Roman civilizations.

'),
	 ('Animals','Animals games involve animals as a major component of the theme or gameplay. Animals games often require players to attend to the management or control of animals. Players may even take on the role of an animal (or animals) in the game.');
INSERT INTO public.category (name,description) VALUES
	 ('Arabian','Arabian games are generally fantasy or adventure games that have themes or storylines set in or inspired by the Arabian Peninsula of the Middle East, but may include locations around the Persian Gulf or North/East Africa as well. Popular themes and imagery in Arabian games include deserts, palaces, camels, jewels, markets/casbahs, genies, flying carpets, and oases, among others.

'),
	 ('Aviation / Flight','Games primarily concerned with mechanical flight, including planes, helicopters, and gliders.'),
	 ('Bluffing','Bluffing games encourage players to use deception to achieve their aims. All Bluffing games have an element of hidden information in them.'),
	 ('Book','Book games are not games per se, but rather a collection of game designs and rules that can be played using common gaming equipment (checkered board, paper and pencil, cards, dominoes, dice, etc.). Another type of Book games are those like Steve Jackson''s Sorcery! series that uses storytelling, dice rolling, and a multiple-choice paragraph system as mechanics.'),
	 ('Card Game','Card Games use cards as its sole or central component. There are stand-alone card games, in which all the cards necessary for gameplay are purchased at once. There are also Collectible Card Games (CCGs), where players purchase starter and booster packs in an effort to compile a more and more powerful deck of cards to compete with.'),
	 ('Children''s Game','Children''s Games are often driven by a set of simple rules and elementary themes geared towards younger players. However, the most popular Children''s Games are just that because they can be (and are) enjoyed by gamers of all ages.'),
	 ('City Building','City Building games compel players to construct and manage a city in a way that is efficient, powerful, and/or lucrative.'),
	 ('Civil War','Civil War games generally have storylines concerning a violent battle for government control between two more groups from the same country. The majority of Civil War games are also categorized as Wargames.'),
	 ('Civilization','Civilization games often have players developing and managing a society of people. The aim of each player is usually to employ citizens in ways that are beneficial to society, and have them progress throughout the game so that their civilization gains superiority over others. Civilization games may have each player build their society independently, or through warfare and diplomacy, each player may find themselves benefiting or suffering from the actions of others.'),
	 ('Collectible Components','Collectible Components games are ones where the components required to play the game are purchased incrementally, rather than all at once.

These games have a transitory nature as reprints really aren''t possible. Collecting a complete set for many of these games could be considered a hobby.

The most popular Collectible Components games come in the form of Collectible Card Games (CCG) or Miniatures games.');
INSERT INTO public.category (name,description) VALUES
	 ('Comic Book / Strip','Comic Book/Strip games often have themes and storylines that are based on established comic book/strip characters. Comic Book/Strip games may have been designed independently, or have been built onto previously established game systems (e.g., HeroClix).'),
	 ('Deduction','Deduction games are those that require players to form conclusions based on available premises. These games are quite varied, including several different types of logical reasoning.'),
	 ('Dice','Dice games often use dice as its sole or principal component. Dice games traditionally focus almost exclusively on dice rolling as a mechanic (e.g., Yahtzee, Perudo, Can''t Stop).'),
	 ('Economic','Economic games encourage players to manage a system of production, distribution, trade, and/or consumption of goods. The games usually simulate a market in some way. The term is often used interchangeably with resource management games.'),
	 ('Educational','Educational games have been specifically designed to teach people about a certain subject, expand concepts, reinforce development, understand an historical event or culture, or assist them in learning a skill as they play.'),
	 ('Electronic','Electronic games often have an electronic apparatus as the central component of the game. They differ from electrified games (e.g., Operation) as Electronic game components will contain circuitry, and sometimes a simple computer.'),
	 ('Environmental','Environmental games often have themes and storylines regarding environmental conservation and management.'),
	 ('Expansion for Base-game','Expansion for Base-game games are sets of additional components and rules for expanding on an original base game. An expansion cannot be played alone; they must be used in conjunction with the base game.'),
	 ('Exploration','Exploration games often encourage players to discover and search new areas or territories for particular objects or goods, and/or to search for people to become trading partners with.'),
	 ('Fantasy','Fantasy games are those that have themes and scenarios that exist in a fictional world. It is a genre that uses magic and other supernatural forms as a primary element of plot, theme, and/or setting. Fantasy game elements usually include:
- Creatures that are common in fantasy books and comics, such as orcs, trolls, goblins, dragons, etc. 
- Magic that can be used with units or abilities
- Can involve a struggle between good and evil forces.');
INSERT INTO public.category (name,description) VALUES
	 ('Farming','Farming games encourage players to build and manage farmland for the purposes of growing crops and/or tending to livestock, often to be sold or traded later on.'),
	 ('Fighting','Fighting games are those that encourage players to engage game characters in close quarter battles and hand-to-hand combat.

Fighting games differ from Wargames in that the combat in Wargames exists as one part of a large-scale military simulation, while in Fighting games the focus is on the particular combat scenarios.'),
	 ('Horror','Horror games often contain themes and imagery depicting morbid and supernatural elements.'),
	 ('Humor','Humor games often have themes and gameplay that provoke laughter and amusement. More specifically, humor games may require players to engage in clowning, comedy, jokes, and/or satire as an objective of the game.'),
	 ('Industry / Manufacturing','Industry / Manufacturing games encourage players to build, manage and/or operate tools and machinery in order to manufacture raw materials into goods and products.

Many of the most popular Industry / Manufacturing games are Economic games as well.'),
	 ('Korean War','Korean War games cover the military conflict between North and South Korea (and their respective allies) during 1950-1953.

The most popular Korean War games are also categorized as Wargames.

'),
	 ('Mafia','Mafia games have themes and scenarios related to classic Sicilian criminal organizations. However, some games in the Mafia category may be related to other organized criminal groups.

This is not a mechanic, it''s a narrative or theme.'),
	 ('Math','Math games explicitly require players to use mathematical knowledge and concepts to achieve game objectives. Games involving ordering of numbers or only basic arithmetic should be classified as Number games instead.'),
	 ('Mature / Adult','Mature/Adult games often contain explicit humour and situations that might be offensive to some adults and not appropriate for younger gamers. Many of these games contain sex or alcohol related humour.'),
	 ('Maze','Maze games often require players to navigate a series of pathways that are located on the game board.

');
INSERT INTO public.category (name,description) VALUES
	 ('Medical','Medical games have themes related to the science of natural healing. Themes may include surgery, cures, recovery/recuperation/physical therapy, psychiatry, pharmaceutical prescription, and other medicine-related items.'),
	 ('Medieval','Medieval games that have themes or storylines set in Europe or Asia, between the 5th century (476, the fall of the Western Roman Empire) and the 15th century (1492, the beginnings of European overseas colonization).'),
	 ('Memory','Memory games require players to retain and recall previous game events or information as an objective.'),
	 ('Miniatures','Miniatures games are games in which miniatures are used to stage the game scenes. In such games, miniatures are the key components, and the playing area represents the miniature''s surroundings in a matching scale. Note: Not all games that use miniatures as components are miniature games. '),
	 ('Modern Warfare','Modern Warfare games cover armed conflicts occurring after World War II (1945 - present). Two precise wars during this period have their own specific category: Korean War (1950-53) and Vietnam War (1945-75).

The most popular Modern Warfare games are also categorized as Wargames.'),
	 ('movies / TV / Radio theme','Movies/TV/Radio games are often those that are thematically linked with a popular movie, television show, or radio program. Other Movies/TV/Radio games may test players'' knowledge about these media, or the game environment may be set in the movie, television, or radio industry.'),
	 ('Murder / Mistery','Murder/Mystery games often involve an unsolved murder or murders. A requirement of these games is usually for players to investigate these crimes, and determine the criminal details and/or perpetrator(s).'),
	 ('Music','Music games are thematically linked to music, bands and/or the music industry. While many of the popular Music games test players knowledge on music (e.g., Cranium Pop 5, Encore), a number of these games are only linked to music as a theme in the game environment (e.g., Schrille Stille, Battle of the Bands).'),
	 ('Mythology','Mythology games are those that incorporate a thematic narrative that defines how the game world or characters came into existence, especially those related or based on narratives of ancient civilizations of the world.

The storyline in a number of Mythology games usually includes supernatural elements, such as gods, goddesses and demigods, and are sometimes set in a fabled, primordial time, which usually corresponds to a general corpus of folk stories (myths) that used to have some form of religious or sacred nature for the cultures that engendered these stories.

'),
	 ('Napoleonic','Napoleonic games have storylines set during the French Revolution (1789-1799) and Napoleonic Wars (1803-1815).

Most Napoleonic games are also categorized as Wargames.');
INSERT INTO public.category (name,description) VALUES
	 ('Nautical','Nautical games involve sailors, ships, and/or maritime navigation as a major component of the theme or gameplay. Most Nautical games require players to effectively control ships as an objective.'),
	 ('Negotiation','Negotiation games explicitly involve and encourage making deals and alliances with other players and backstabbing when appropriate. Winning is rare without participating in these deals. Unlike cooperative games, Negotiation games are still largely competitive, while granting players certain times to make mutual agreements through discussion.'),
	 ('Novel-based','Novel-based games are those that are thematically linked with a popular novel or novel series.

Games linked to other works of literature (poems, theatre plays, etc.) can be included too.'),
	 ('Number','Number games require players to use or manipulate numbers to achieve their aims.'),
	 ('Party Game','Party games are games that encourage social interaction. They generally have easy setups and simple rules, and they can accommodate large groups of people and play in a short amount of time. Lots of laughs.'),
	 ('Pirates','Pirate games have a main character, theme or storyline of piracy. Some of the most popular themes and imagery in Pirate games concerns treasure hunting, sea robbery, swords and cannons, swashbuckling, and ship racing. Many Pirate games occur in timelines prior to the 20th century.'),
	 ('Political','Political games encourage players to use their character''s authority to manipulate societal activities and policy.'),
	 ('Post-Napoleonic','Games that cover the period between the end of Napoleonic Wars (1815) and start of World War I (1914), covering most of XIX (19) th century.

Many Post-Napoleonic games are also categorized as Wargames.'),
	 ('Prehistoric','Prehistoric games often have themes or storylines set in a time before recorded history. These unwritten histories are usually compiled under time periods, including the Stone Age, Bronze Age, and Iron Age.

Many of the popular Prehistoric games are set in the Stone Age, hunter/gatherer societies, or time periods when dinosaurs existed.

'),
	 ('Puzzle','Puzzle games are those in which the players are trying to solve a puzzle. Many puzzle games require players to use problem solving, pattern recognition, organization and/or sequencing to reach their objectives. Escape Room and Mystery Room games are types of Puzzle games.

');
INSERT INTO public.category (name,description) VALUES
	 ('Racing','Games where the objective is to be the first to reach a checkpoint by navigation or steering around obstacles, usually by having greater speed and/or control than your opponents.

Games in which players simply attempt to attain a particular goal (winning condition) more quickly than other players are utilizing the Race mechanic.'),
	 ('Real-time','In real-time games, players are encouraged to take their turns as quickly as possible, often simultaneously. In some real-time games, a player is penalized if they don''t do something within a set amount of time.

Real-Time is different than Elapsed Real Time Ending, in which gameplay ends after a set amount of actual time has elapsed--as in Space Alert, Escape from Colditz, Escape: The Curse of the Temple, Space Alert, and most escape room type games, including the Escape Room: The Game series and the Unlock! series.

'),
	 ('Religion','A Religious themed boardgame features elements of their narrative, setting or characters that relates to current belief systems (religions) of the world, either in their historical aspect and its development through time or in their actual objects of faith, like sacred scriptures and articles of doctrine.

'),
	 ('Renaissance','Renaissance games are those set between the end of the XIV (14)th century (when the Renaissance began in Italy) and roughly the end of the XVI (16)th century when firearms were not yet dominating the battle field. Approximately from 1380 to 1590.'),
	 ('Science Fiction','Science Fiction games often have themes relating to imagined possibilities in the sciences. Such games need not be futuristic; they can be based on an alternative past. (For example, the writings of Jules Verne and the Star Wars saga are set before present time.) Many of the most popular Science Fiction games are set in outer space, and often involve alien races.

'),
	 ('Space Exploration','Space Exploration games often have themes and storylines relating to travel and adventure in outer space. Often, players must seek and gather resources and territories as objectives of the game.

Many of the popular Space Exploration games are also categorized under Science Fiction.'),
	 ('Spies / Secret Agents','Spies/Secret Agents games often have themes or storylines relating to espionage. Often, players must identify another player who has taken the role of spy or secret agent and attempt to reveal secret information that this player holds. Many of the most popular Spies/Secret Agents games are also categorized under Bluffing and/or Deduction, and as such have an element of hidden information to them.'),
	 ('Sports','Sports games often have themes or storylines related to the physical activity of sports. The sports represented in the most popular Sports boardgames are football and racing (whether car, boat, bicycle or horse).'),
	 ('Territory Building','Territory Building games have the players establish and/or amass control over a specific area. Often, these games employ Area Majority / Influence or Enclosure mechanics; the latter in which the areas are not delineated at the beginning of the game but are instead created as the game progresses.

'),
	 ('Trains','Train games often involve gameplay and imagery related to railroads and rail vehicles. Many of the most popular Train games are set in the late 19th and early 20th centuries (although some games, like Lunar Rails, are set in the future).');
INSERT INTO public.category (name,description) VALUES
	 ('Transportation','Transportation games often have gameplay involving the movement of goods or people from one place to another. Many of the most popular Transportation games are Train games.'),
	 ('Travel','Travel games often have gameplay where an objective is to move to and from different geographic locations. As such, Travel games usually employ a map as the main feature of the game board.'),
	 ('Trivia','Trivia games often test players on their knowledge of general interests and popular culture.'),
	 ('Video Game Theme','Video Game Theme applies to games that are thematically linked with or inspired by a video game franchise or genre. Some early games created with these themes are PAC-MAN Game and Frogger.'),
	 ('Vietnam War','Vietnam War games cover military campaigns in Indochina (Vietnam, Cambodia, Laos): from 1945 until 1975.
Note: Indochina war (1945-54) - France and allies against Việt Minh and allies; Vietnam war (1965-75) - United States and allies against North Vietnam and allies

Most Vietnam War games are also categorized as Wargames.'),
	 ('Wargame','Wargames are games that depict military actions. Wargames are set in a variety of timelines, from the Ancient period to present conflicts and even in the future. Thematically, Wargames cover everything from actions between small units on a very small board to larger, extremely detailed conflicts and even global-scale wars.'),
	 ('Word Game','Word games often require players to competitively use their knowledge of language. Language knowledge in Word games is often focused on spelling and definitions.'),
	 ('World War I','World War I games covers military campaigns from 1914 until 1918.

Most World War I games are also categorized as Wargames.'),
	 ('World War II','World War II games have storylines set during various military campaigns in Europe, Asia, and Africa from 1939 until 1945.

Most World War II games are also categorized as Wargames.'),
	 ('Zombies','Zombie games often contain themes and imagery concerning the animated dead. Some of the more popular storylines in Zombie games include apocalyptic themes, horror, and fighting.')
");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
