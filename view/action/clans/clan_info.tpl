	<div class='nag'><span>Lista klanów - informacje o klanie</span></div>
 	{if isset($row)}
    <p style='margin: 20px;'>
    	<b>Nazwa użytkownika:</b> {$row.user_name}<br />
        <b>Nazwa klanu:</b> {$row.user_team_name}<br />
        <b>Rodzaj klanu:</b> {$row.user_team_status}<br />
        <b>Gra klanowa:</b> {$row.user_team_game} <br />
        <b>Ulubiona mapa klanu:</b> {$row.user_team_map}<br />
        <b>Ilość graczy w klanie:</b> {$row.user_team_players}
      </p>
    {/if}
	 {if isset($actionMessage)}
     	{$actionMessage}
	 {/if}
 
