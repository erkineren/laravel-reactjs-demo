import React from 'react';
import {Table} from "semantic-ui-react";
import EntityTable from "../../components/EntityUI/EntityTable";
import {formatDate} from "../../helpers";


function HomeworkTable() {

    return (
        <EntityTable
            route={'homeworks'}
            header={(
                <>
                    <Table.HeaderCell>Course</Table.HeaderCell>
                    <Table.HeaderCell>Title</Table.HeaderCell>
                    <Table.HeaderCell>Description</Table.HeaderCell>
                    <Table.HeaderCell>Due at</Table.HeaderCell>
                </>
            )}
            row={(d) => (
                <>
                    <Table.Cell width={2}>{d.lecture.title}</Table.Cell>
                    <Table.Cell width={2}>{d.title}</Table.Cell>
                    <Table.Cell width={2}>{d.description}</Table.Cell>
                    <Table.Cell width={2}>{formatDate(d.due_at)}</Table.Cell>
                </>
            )}
        />

    );
}


export default HomeworkTable;