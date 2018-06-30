# Perch CollectionList fieldtype

A fieldtype for Perch Runway CMS to select an item from a collection. Perch Runway only. Similar to [Dataselect](https://docs.grabaperch.com/templates/field-types/dataselect/), but for Perch Runway Collections rather than Perch regions.

You probably want to use [`<perch:related />`](https://docs.grabaperch.com/runway/relationships/) instead, but this fieldtype is useful in some situations. For example, if you want to limit the user to a single selection, or for use inside a [`<perch:repeater />`](https://docs.grabaperch.com/templates/repeaters/) tag (where the `<perch:related />` tag doesn't seem to work).

## Installation

Copy the `collectionlist` folder to `perch/addons/fieldtypes`.

General documentation on Perch fieldtypes can be found on the [Perch support site](https://docs.grabaperch.com/templates/field-types/).

## Attributes
- collection: Required. The name of the collection.
- options: Required. The ID of a field in the collection to populate the select box with.
- values: Optional. The ID of another field in the collection to take the values from. If omitted, the internal itemID is used.

## Examples
`<perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" />`
`<perch:content id="book" type="collectionlist" collection="Books" label="Book" options="title" values="isbn" />`
