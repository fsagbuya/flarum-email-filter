<?php

namespace NYU8\FlarumEmailFilter\Api\Resource;

use Flarum\Api\Endpoint;
use Flarum\Api\Resource\AbstractDatabaseResource;
use Flarum\Api\Schema;
use NYU8\FlarumEmailFilter\Rule;

/**
 * @extends AbstractDatabaseResource<Rule>
 */
class RuleResource extends AbstractDatabaseResource
{
    public function type(): string
    {
        return 'email_rules';
    }

    public function model(): string
    {
        return Rule::class;
    }

    public function endpoints(): array
    {
        return [
            Endpoint\Index::make()->admin(),
            Endpoint\Create::make()->admin(),
            Endpoint\Update::make()->admin(),
            Endpoint\Delete::make()->admin(),
        ];
    }

    public function fields(): array
    {
        return [
            Schema\Integer::make('ruleType')
                ->writable()
                ->requiredOnCreate(),
            Schema\Str::make('name')
                ->writable()
                ->requiredOnCreate(),
            Schema\Str::make('value')
                ->writable()
                ->requiredOnCreate(),
            Schema\Integer::make('active')
                ->writable()
                ->requiredOnCreate(),
        ];
    }
}
