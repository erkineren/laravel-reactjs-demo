import React from 'react';
import {Table} from "semantic-ui-react";
import EntityTable from "../../components/EntityUI/EntityTable";
import {formatDate} from "../../helpers";


function PurchaseTable() {

    return (
        <EntityTable
            route={'purchases'}
            header={(
                <>
                    <Table.HeaderCell>Course</Table.HeaderCell>
                    <Table.HeaderCell>User</Table.HeaderCell>
                    <Table.HeaderCell>Price</Table.HeaderCell>
                    <Table.HeaderCell>Paid At</Table.HeaderCell>
                </>
            )}
            row={(d) => (
                <>
                    <Table.Cell width={2}>{d.course.title}</Table.Cell>
                    <Table.Cell width={2}>{d.user.name}</Table.Cell>
                    <Table.Cell width={2}>{d.price} TL</Table.Cell>
                    <Table.Cell width={2}>{formatDate(d.due_at)}</Table.Cell>
                </>
            )}
        />

    );
}


export default PurchaseTable;