import React from 'react';
import {Table} from "semantic-ui-react";
import EntityTable from "../../components/EntityUI/EntityTable";


function UserTable() {

    return (
        <EntityTable
            route={'users'}
            header={(
                <>
                    <Table.HeaderCell>Name</Table.HeaderCell>
                    <Table.HeaderCell>Email</Table.HeaderCell>
                </>
            )}
            row={(d) => (
                <>
                    <Table.Cell width={2}>{d.name}</Table.Cell>
                    <Table.Cell width={2}>{d.email}</Table.Cell>
                </>
            )}
        />

    );
}


export default UserTable;