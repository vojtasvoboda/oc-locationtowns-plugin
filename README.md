# Location Town plugin for OctoberCMS

Adds towns to states managed by RainLab.Location plugin. Required plugins: RainLab.Location.

- component for state towns with pagination
- component for Town detail
- hooks for RainLab.Sitemap
- extends RainLab State model

## Render Town detail

This component render town detail. Just create page Town-detail with slug 
`/town-detail/:slug?` and insert Town component:

![Town component](assets/images/locationtowns-component-town.png)

To override Town detail template just create partial file `/town/default.htm` as copy 
of `/plugins/vojtasvoboda/components/town/default.htm` and make own changes.

## Render list of Towns

Create page Towns with slug `/towns/:page?` where page means paginating. Insert 
component Towns. Set filter for State and select page for show Town detail 
created above:

![Towns component](assets/images/locationtowns-component-towns.png)

To override Towns listing template just create partial file `/towns/default.htm` as copy 
of `/plugins/vojtasvoboda/components/towns/default.htm` and make own changes.

## Add towns to sitemap

Just install RainLab.Sitemap plugin and insert one town or all towns to sitemap:

![Towns in sitemap](assets/images/locationtowns-sitemap-integration.png)

## Services

List of available services provided by plugin:

### locationtowns service

```
$towns = App::make('locationstowns');
$town = $towns->findOneBySlug('praha');
$allTowns = $towns->all();
$townsByState = $towns->where('state_id', 285)->get();
```

### RainLab State extension

```
$state = \RainLab\Location\Models\State::find('285');
$towns = $state->towns;
```

## TODO

**Feel free to send pullrequest!**

- !!fix fixed URL path at Town:114 and Town:129 (there should by path set in component)
- !filter only by active states in towns component
- directly extend RainLab.Location.State form to manage towns related to this state
- run plugin without RainLab.Location (only town management)
- add select box 'country' to backend listing for filtrating states
- it is not possible to do october:down
- add import and export

## License

LocationTown plugin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) same as OctoberCMS platform.

## Contributing

Please send Pull Request to master branch.
