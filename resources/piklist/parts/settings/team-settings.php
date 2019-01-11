<?php
/*
Title: Team Settings
Setting: dancefloor_settings
Tab: Team
Flow: Dancefloor Workflow
*/

function get_team_members(){
  $profs = get_users( 'role=teacher' );
  $team = [];
  foreach ($profs as $p) {
    $team[$p->user_login] = $p->user_login;
  }
  return $team;
}

$team_section_title = [
  'type'      => 'text',
  'field'     => 'team_section_title',
  'label'     => __('Title', 'sage'),
  'required'  => true,
  'columns'   => 12,
];

$teamteam_section_users = [
  'type'     => 'select',
  'field'    => 'team_member',
  'label'    => __('Team members', 'sage'),
  'columns'  => 6,
  'choices'  => get_team_members(),
  'add_more' => true,
];


piklist('field', array(
  'type'        => 'group',
  'field'       => 'team_group',
  'label'       => __('Section', 'piklist-demo'),
  'list'        => false,
  'description' => __('A grouped field with the field parameter set.', 'piklist-demo'),
  'fields'      => [ $team_section_title, $teamteam_section_users ],
  'add_more'    => true,
));
