import React from 'react';
import {Table} from "semantic-ui-react";
import {formatDate} from "../../helpers";
import EntityTable from "../../components/EntityUI/EntityTable";


function CourseTable() {

    return (
        <EntityTable
            route={'courses'}
            header={(
                <>
                    <Table.HeaderCell>Title</Table.HeaderCell>
                    <Table.HeaderCell>Price</Table.HeaderCell>
                    <Table.HeaderCell>Description</Table.HeaderCell>
                </>
            )}
            row={(d) => (
                <>
                    <Table.Cell width={2}>{d.title}</Table.Cell>
                    <Table.Cell width={2}>{d.price} TL</Table.Cell>
                    <Table.Cell width={5}>{d.description}</Table.Cell>
                </>
            )}
        />

    );
}


export default CourseTable;